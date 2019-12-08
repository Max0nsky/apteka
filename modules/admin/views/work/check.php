<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <h2 align="center">Учет товаров:</h2><br>
        <table class="table table-bordered">
            <tr>
                <th>Номер склада</th>
                <th>Дата</th>
                <th>Начало дня</th>
                <th>Конец дня</th>
                <th>Фамилия проверяющего</th>
            </tr>
            <?php foreach ($chech_store as $check) : ?>
                <tr>
                    <td><?= $check['num'] ?></td>
                    <td><?= $check['date_check'] ?></td>
                    <td><?= $check['count_start'] ?></td>
                    <td><?= $check['count_finish'] ?></td>
                    <td><?= $check['name_worker'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <a href="/admin/work/controlview"><div align="center"><button type="submit" class="btn btn-success">Добавить запись</button></div><br></a>
</div>