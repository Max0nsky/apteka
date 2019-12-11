<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="container">
    <h2 align="center">Завоз товаров:</h2><br>
    <table class="table table-bordered">
        <tr>
            <th>Номер склада</th>
            <th>Название лекарства</th>
            <th>Количество</th>
            <th>Завоз товара</th>
        </tr>
        <?php foreach ($store_condition as $store) : ?>
            <form action="/admin/work/orders" method="GET">
                <input type="hidden" value="<?= $store['num']  ?>" name="num" />
                <input type="hidden" value="<?= $store['drug_name'] ?>" name="drug_name" />
                <input type="hidden" value="<?= $store['quantity'] ?>" name="quantity" />
                <tr>
                    <td><?= $store['num'] ?></td>
                    <td><?= $store['drug_name'] ?></td>
                    <td><?= $store['quantity'] ?></td>
                    <td style="width: 150px;"><button type="submit" formmethod="get" formaction="/admin/work/updatestore" class="btn btn-link">Изменить</button> </td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
</div>