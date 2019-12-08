<?php
 
namespace app\controllers;

use app\models\Medicine;
use Yii;
use yii\data\Pagination;
use app\controllers\AppController;
use app\models\Buy;


class MedicineController extends AppController
{

    public function actionIndex()
    {
        //$sql = "SELECT * FROM `medicines`";
 
        $query = Medicine::find();

        $pages = new Pagination(['totalCount' => $query->count(), 'pagesize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $things = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('things', 'pages'));
    }

    public function actionSearch()
    {
        //$sql_searsh = "SELECT * FROM medicines WHERE drug_name LIKE " . "'" . $search . "'";
        //$search_product = Yii::$app->db->createCommand($sql_searsh)->queryAll();

        $search = trim(Yii::$app->request->get('search'));
        if (!$search) {
            return $this->render('search');
        }
        $search_product = Medicine::find()->where(['like', 'drug_name', $search]);

        $pages = new Pagination(['totalCount' => $search_product->count(), 'pagesize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $things = $search_product->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('things', 'pages', 'search'));
    }

    public function actionPurchase()
    {
        $drug_name = Yii::$app->request->get('drug_name');

        $buy_medicine = new Buy(); 
        $buy_medicine->date_buy = date("Y-m-d");
        $buy_medicine->drug_name = $drug_name;

        $sql_store = "SELECT MAX(quantity) FROM store_condition WHERE drug_name LIKE " . "'" . $drug_name . "'";
        $result_store = Yii::$app->db->createCommand($sql_store)->queryAll();
        $r_s = $result_store[0]['MAX(quantity)'];

        if ($buy_medicine->load(Yii::$app->request->post())) 
        {
            if ($r_s >= $buy_medicine->quantity) 
            {
                $sql_store_num = "SELECT num FROM store_condition WHERE quantity LIKE " . "'" . $r_s . "'";
                $result_store_num = Yii::$app->db->createCommand($sql_store_num)->queryAll();
                $buy_medicine->num_store = $result_store_num[0]['num'];
                $num = $r_s - $buy_medicine->quantity;
                if ($buy_medicine->validate()) 
                { 
                    $sql_in_pushases = "INSERT INTO `purchases` (`firstname`, `surname`, `patronymic`, `drug_name`, `quantity`, `num_store`, `phone`, `date_buy`) VALUES ('".$buy_medicine->firstname."', '".$buy_medicine->surname."', '".$buy_medicine->patronymic."', '".$buy_medicine->drug_name."', '".$buy_medicine->quantity."', '".$buy_medicine->num_store."', '".$buy_medicine->phone."', '".$buy_medicine->date_buy."')";
                    $sql_update = "UPDATE `store_condition` SET `quantity` = ".$num." WHERE `store_condition`.`num` = ".$buy_medicine->num_store." AND `store_condition`.`drug_name` = '".$buy_medicine->drug_name."'";
                    Yii::$app->db->createCommand($sql_in_pushases)->execute();
                    Yii::$app->db->createCommand($sql_update)->execute();
                    Yii::$app->session->setFlash('success', 'Заказ успешно оформлен!');
                } 
                else 
                { 
                    Yii::$app->session->setFlash('error', 'Извините, произошла ошибка!');
                }
            }
        }
        return $this->render('purchase', compact('drug_name', 'buy_medicine', 'r_s'));
    }
}
