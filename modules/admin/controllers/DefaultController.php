<?php

namespace app\modules\admin\controllers;
use Yii;

use yii\web\Controller;

class DefaultController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
