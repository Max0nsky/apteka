<?php
 
namespace app\controllers;

use app\controllers\AppController;
use app\models\Medicine;
use Yii;

class ProductController extends AppController
{

    public function actionView($drug_name)
    {
        $drug_name = Yii::$app->request->get('drug_name');

        $sql_product = "SELECT * FROM medicines WHERE drug_name LIKE " . "'" . $drug_name . "'";
        $sql_analogues = "SELECT analogue FROM analogues WHERE drug_name LIKE " . "'" . $drug_name . "'";

        $product = Yii::$app->db->createCommand($sql_product)->queryAll();
        $analogues = Yii::$app->db->createCommand($sql_analogues)->queryAll();

        if (empty($product)) 
        {
            throw new \yii\web\HttpException(404, 'Несуществующий товар');
        }
        return $this->render('view', compact('product', 'analogues'));
    }
}
