<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <h2 align="center">Завоз товаров:</h2><br>
    <form action="/admin/work/orders" method="GET">
        <table class="table table-bordered">
            <tr>
                <th>Номер склада</th>
                <th>Название лекарства</th>
                <th>Количество</th>
                <th>Завоз товара</th>
            </tr>
            <?php foreach ($store_condition as $store) : ?>
                <input type="hidden" value="<?= $store['num']  ?>" name="condition_purchase" />
                <input type="hidden" value="<?= $store['drug_name'] ?>" name="condition_purchase" />
                <tr>
                    <td><?= $store['num'] ?></td>
                    <td><?= $store['drug_name'] ?></td>
                    <td><?= $store['quantity'] ?></td>
                    <td style="width: 150px;"><button type="submit" formmethod="get" formaction="index.html" class="btn btn-link">Добавить</button> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
    <div align="center"><button type="submit" formaction="index.html" class="btn btn-success">Внести новое</button></div><br>
</div>