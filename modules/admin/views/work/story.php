<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <h2 align="center">История цен:</h2><br>
    <form action="/admin/work/orders" method="GET">
        <table class="table table-bordered">
            <tr>
                <th>Название леканства</th>
                <th>Дата</th>
                <th>Цена</th>
            </tr>
            <?php foreach ($price_story as $story) : ?>
                <tr>
                    <td><?= $story['drug_name'] ?></td>
                    <td><?= $story['date_price'] ?></td>
                    <td><?= $story['price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form><br>
</div>