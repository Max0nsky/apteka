<?php
 
/////////////////////////////////////////////////////
//                                                 //
//        Прямые запросы использованы для          //
//        специфичного задания в курсовой          //
//        работе. Это небезопасно и может          //
//        привести к SQL-инъекциям!                //
//                                                 //
///////////////////////////////////////////////////// 

namespace app\controllers;

use app\controllers\AppController;
use app\models\Medicine;
use Yii;

class ProductController extends AppController
{

    public function actionView($drug_name)
    {
        $drug_name = Yii::$app->request->get('drug_name');

        $product = Medicine::find()->where(['drug_name' => $drug_name])->one();

        $sql_analogues = "SELECT analogue FROM analogues WHERE drug_name LIKE " . "'" . $product->drug_name . "'";

        $analogues = Yii::$app->db->createCommand($sql_analogues)->queryAll();

        if (empty($product)) 
        {
            throw new \yii\web\HttpException(404, 'Несуществующий товар');
        }
        
        return $this->render('view', compact('product', 'analogues'));
    }
}
