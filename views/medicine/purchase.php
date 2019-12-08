<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
 
/* @var $this yii\web\View */
 

$this->title = 'Оформление заказа';
?>
<section>
    <div class="container">
        <div class="row">
            <h3>Оформление заказа "<?= $drug_name ?>"</h3>
            <h4>(На складе: <?=$r_s?>)</h4>
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
                <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'Buy']]) ?>
                <?= $form->field($buy_medicine, 'firstname') ?>
                <?= $form->field($buy_medicine, 'surname') ?>
                <?= $form->field($buy_medicine, 'patronymic') ?>
                <? // $form->field($buy_medicine, 'drug_name')
                ?>
                <?= $form->field($buy_medicine, 'quantity') ?>
                <? // $form->field($buy_medicine, 'num_store')
                ?>
                <?= $form->field($buy_medicine, 'phone') ?>
                <? // $form->field($buy_medicine, 'date_buy')
                ?>
                <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
    <br>
</section>