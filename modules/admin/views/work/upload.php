<?php

use yii\widgets\ActiveForm;
?>
<div class="container">
    <div align="center">
        <h2>ВНИМАНИЕ!</h2><h4> Имена загружаемых фалов будут использоваться для привязки к товарам при добавлении.</h4>
        <?php if ($model->image) : ?>
            <img src="/uploads/<?= $model->image ?>" alt="">
        <?php endif; ?>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'image')->fileInput() ?>
        <button class="btn btn-success">Загрузить</button>
        <?php ActiveForm::end() ?>
    </div>
</div>