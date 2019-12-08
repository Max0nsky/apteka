<?php

namespace app\modules\admin\controllers;

use app\models\Control;
use Yii;
use yii\web\Controller;

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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if($model->store)
            $sql = "INSERT INTO `check_store` (`num`, `date_check`, `count_start`, `count_finish`, `name_worker`) VALUES ('" . $model->store . "', '" . $date_this . "', '" . $model->start . "', '" . $model->finish . "', '" . $model->surname . "');";
            Yii::$app->db->createCommand($sql)->execute();
            Yii::$app->session->setFlash('success', 'Данные о проверке успешно отправлены');
        } 
        else 
        {
            Yii::$app->session->setFlash('error', 'Произошла ошибка! Попробуйте ввести данные заново.');
        }
        return $this->render('сontrolview', compact('model'));
    }
}
