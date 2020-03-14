<?php

/////////////////////////////////////////////////////
//                                                 //
//        Прямые запросы использованы для          //
//        специфичного задания в курсовой          //
//        работе. Это небезопасно и может          //
//        привести к SQL-инъекциям!                //
//                                                 //
///////////////////////////////////////////////////// 

namespace app\modules\admin\controllers;

use app\models\Control;
use app\models\Preparat;
use app\models\UploadImage;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class WorkController extends Controller
{
    public function actionOrders()
    {
        $sql = "SELECT * FROM `purchases`";
        $purchases = Yii::$app->db->createCommand($sql)->queryAll();

        $purchase = $_GET['purchase'];
        $condition_purchase = $_GET['condition_purchase'];
        if (isset($purchase)) {
            if ($condition_purchase = "Ожидание") {
                $sql_update = "UPDATE `purchases` SET `condition_purchase` = 'Продано' WHERE `purchases`.`id` =" . $purchase;
                Yii::$app->db->createCommand($sql_update)->execute();
                header("Location:admin/work/orders");
            }
        }

        return $this->render('orders', compact('purchases', 'purchase'));
    }

    public function actionCondition()
    {
        $sql = "SELECT * FROM `store_condition`";
        $store_condition = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('condition', compact('store_condition'));
    }

    public function actionCheck()
    {
        $sql = "SELECT * FROM `check_store`";
        $chech_store = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('check', compact('chech_store'));
    }

    public function actionStory()
    {
        $sql = "SELECT * FROM `price_story`";
        $price_story = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('story', compact('price_story'));
    }

    public function actionControlview()
    {
        $date_this = date("Y-m-d");
        $model = new Control();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->store) {
                $sql = "INSERT INTO `check_store` (`num`, `date_check`, `count_start`, `count_finish`, `name_worker`) 
                VALUES ('" . $model->store . "', '" . $date_this . "', '" . $model->start . "', '" . $model->finish . "', '" . $model->surname . "');";
                Yii::$app->db->createCommand($sql)->execute();
                Yii::$app->session->setFlash('success', 'Данные о проверке успешно отправлены');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка! Попробуйте ввести данные заново.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Произошла ошибка! Попробуйте ввести данные заново.');
        }

        return $this->render('сontrolview', compact('model'));
    }

    public function actionList()
    {
        $sql = "SELECT * FROM `medicines`";
        $list_medicines = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('list', compact('list_medicines'));
    }

    public function actionAddpreparat()
    {
        $add_this = new Preparat();
        if ($add_this->load(Yii::$app->request->post()) && $add_this->validate()) {
            $sql = "INSERT INTO `medicines` (`drug_name`, `description`, `price`, `img`) 
            VALUES ('" . $add_this->drug_name . "', '" . $add_this->description . "', '" . $add_this->price . "', '" . $add_this->img . "');";
            $sql2 = "INSERT INTO `store_condition` (`num`, `drug_name`, `quantity`) 
            VALUES ('1', '" . $add_this->drug_name . "', '0'), ('2', '" . $add_this->drug_name . "', '0')";
            
            Yii::$app->db->createCommand($sql)->execute();
            Yii::$app->db->createCommand($sql2)->execute();
            Yii::$app->session->setFlash('success', 'Данные успешно отправлены');
        } else {
            Yii::$app->session->setFlash('error', 'Введите данные правильно.');
        }

        return $this->render('addpreparat', compact('add_this'));
    }

    public function actionUpload()
    {
        $model = new UploadImage();
        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionUpdatestore()
    {
        Yii::$app->session->setFlash('error', 'q');

        if (isset($_GET['num_before']) and isset($_GET['drug_name_before']) and isset($_GET['quantity_before'])) {
            $sql_update = "UPDATE `store_condition` SET `quantity` = '" . $_GET['quantity_before'] . "' 
            WHERE `store_condition`.`num` = " . $_GET['num_before'] . " AND `store_condition`.`drug_name` = '" . $_GET['drug_name_before'] . "';";
            Yii::$app->db->createCommand($sql_update)->execute();
            return $this->redirect('/admin/work/condition');
            die;
        }

        return $this->render('updatestore');
    }
    public function actionUpdatepreparat()
    {
        $drug_name = Yii::$app->request->get('drug_name');

        $sql_preparat = "SELECT * FROM medicines WHERE drug_name LIKE " . "'" . $drug_name . "'";
        $preparat = Yii::$app->db->createCommand($sql_preparat)->queryAll();

        $add_this = new Preparat();
        $add_this->drug_name = $drug_name;
        $add_this->description = $preparat[0]['description'];;
        $add_this->price = $preparat[0]['price'];;
        $add_this->img = $preparat[0]['img'];;

        if ($add_this->load(Yii::$app->request->post()) && $add_this->validate()) {
            $sql = "UPDATE `medicines`
            SET `drug_name` = '" . $add_this->drug_name . "',
                `description` = '" . $add_this->description . "',
                `price` = '" . $add_this->price . "',
                `img` = '" . $add_this->img . "'
            WHERE `drug_name` = '" . $add_this->drug_name . "';";
            Yii::$app->db->createCommand($sql)->execute();
            Yii::$app->session->setFlash('success', 'Данные успешно отправлены');
        } else {
            Yii::$app->session->setFlash('error', 'Произошла ошибка! Попробуйте ввести данные заново.');
        }

        return $this->render('updatepreparat', compact('preparat', 'add_this'));
    }

    public function actionAnalogues()
    {
        $sql_medicines = "SELECT * FROM `medicines`";
        $list_medicines = Yii::$app->db->createCommand($sql_medicines)->queryAll();

        $sql_analogues = "SELECT * FROM `analogues`";
        $list_analogues = Yii::$app->db->createCommand($sql_analogues)->queryAll();


        if (isset($_GET['drug_name_select']) and isset($_GET['analogues_select'])) {

            $sql = "INSERT INTO `analogues` (`drug_name`, `analogue`) 
            VALUES ('" . $_GET['drug_name_select'] . "', '" . $_GET['analogues_select'] . "');";
            Yii::$app->db->createCommand($sql)->execute();
            return $this->redirect('/admin/work/analogues');
        }

        if (isset($_GET['delete_drug_name'])) {
            $sql = "DELETE FROM `analogues` WHERE `analogues`.`drug_name` = '" . $_GET['delete_drug_name'] . "';";
            Yii::$app->db->createCommand($sql)->execute();
            return $this->redirect('/admin/work/analogues');
        }

        return $this->render('analogues', compact('list_medicines', 'list_analogues'));
    }
}
