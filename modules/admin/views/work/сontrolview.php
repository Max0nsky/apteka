<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<section>
    <div class="container">
        <div class="row">
        <h3>Учет товара за <?=date("Y-m-d");?></h1>
            <?php if (Yii::$app->session->hasFlash('success')) : ?>
                <div class="padding-right alert alert-success col-sm-9" role="alert">
                    <?php echo Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="padding-right alert alert-danger col-sm-9" role="alert">
                    <?php echo Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <div class="col-sm-9 padding-right">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'Control']]) ?>
                <?= $form->field($model, 'surname') ?>
                <?= $form->field($model, 'store') ?>
                <?= $form->field($model, 'start') ?>
                <?= $form->field($model, 'finish') ?>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
    <br>
</section>