<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$drug_name = $_GET['drug_name'];
$num = $_GET['num'];
$quantity = $_GET['quantity'];
?>
    <div class="container">
    <h2 align="center">Завоз товара:</h2><br>
    <h4 align="center">Измените количество препарата "<?= $drug_name; ?>" на складе №<?= $num; ?></h4><br>
    <form action="/admin/work/" method="GET" align="center">
        <input type="hidden" value="<?= $_GET['num'];  ?>" name="num_before" />
        <input type="hidden" value="<?= $_GET['drug_name']; ?>" name="drug_name_before" />
        <p><input type="number" name="quantity_before" value="<?= $quantity; ?>" min="0" max="1000"></p><br><br>
        <button type="submit" formmethod="get" formaction="/admin/work/updatestore" class="btn btn-success">Изменить</button>
        <a href="/admin/work/condition"><button type="button" class="btn btn-danger">Отмена</button></a><br><br>
    </form>
</div>
