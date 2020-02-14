<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="container">

    <?php if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="padding-right alert alert-success col-sm-9" role="alert">
            <?php echo Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <div class="col-sm-9 padding-right">
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'id' => 'Preparat']]) ?>
        <?= $form->field($add_this, 'drug_name'); ?>
        <?= $form->field($add_this, 'description')->textarea(['rows' => 4, 'cols' => 5])->label('Описание'); ?>
        <?= $form->field($add_this, 'price') ?>
        <?= $form->field($add_this, 'img') ?>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    </div>

</div>