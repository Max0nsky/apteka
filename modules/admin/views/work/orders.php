<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="container">
    <h2 align="center">Список заказов:</h2><br>
    <form action="/admin/work/orders" method="GET">
    <table class="table table-bordered">
        <tr>
        <th> </th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Лекарство</th>
            <th>Количество</th>
            <th>Склад</th>
            <th>Телефон</th>
            <th>Дата</th>
            <th>Состояние</th>
        </tr>
        <?php foreach ($purchases as $purchase) : ?>
            <tr>
                <td><input type="radio" value="<?=$purchase['id']?>" name="purchase"/></td>
                <td><?=$purchase['firstname']?></td>
                <td><?=$purchase['surname']?></td>
                <td><?=$purchase['patronymic']?></td>
                <td><?=$purchase['drug_name']?></td>
                <td><?=$purchase['quantity']?></td>
                <td><?=$purchase['num_store']?></td>
                <td><?=$purchase['phone']?></td>
                <td><?=$purchase['date_buy']?></td>
                <td><?=$purchase['condition_purchase']?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="hidden" value="<?=$purchase['condition_purchase']?>" name="condition_purchase"/>
    <div align="center"> <?= Html::submitButton('Выполнить', ['class' => 'btn btn-success']) ?></div><br>
    </form>
</div>