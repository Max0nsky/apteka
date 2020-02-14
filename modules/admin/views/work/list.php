<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
 
?>

<div class="container">
    <h2 align="center">Каталог товаров:</h2><br>
    <table class="table table-bordered">
        <tr>
            <th>Название лекарства</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Изображение</th>
            <th>Действие</th>
        </tr>
        <?php foreach ($list_medicines as $medicine) : ?>
            <form action="/" method="GET">
                <input type="hidden" value="<?= $medicine['drug_name']  ?>" name="drug_name" />
                <tr>
                    <td><?= $medicine['drug_name'] ?></td>
                    <td><?= $medicine['description'] ?></td>
                    <td><?= $medicine['price'] ?></td>
                    <td><?= $medicine['img'] ?></td>
                    <td style="width: 150px;"><button type="submit" formmethod="get" formaction="/admin/work/updatepreparat" class="btn btn-link">Изменить</button></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
    <div align="center"><a href="/admin/work/addpreparat"><button type="submit" class="btn btn-success">Добавить новое</button></a>
        <a href="/admin/work/upload"><button type="submit" class="btn btn-success">Загрузить изображение</button></a></div><br>
</div>