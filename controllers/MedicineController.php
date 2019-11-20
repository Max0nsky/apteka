<?php

namespace app\controllers;
use app\models\Medicine;
use Yii;
use yii\data\Pagination;

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
} 