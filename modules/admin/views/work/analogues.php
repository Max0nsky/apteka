<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="container">
    <h2 align="center"> Привязка аналогов:</h2><br>

    <div align="center" width="250px">
        <form action="/" method="GET">
        <input type="hidden" value="aaa" name="aaa" />
            <p>Для препарата:</p>
            <select name='drug_name_select'>
                <?php foreach ($list_medicines as $medicine) : ?>
                    <option value="<?= $medicine['drug_name'] ?>"> <?= $medicine['drug_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <p>Аналог:</p>
            <select name='analogues_select'>
                <?php foreach ($list_medicines as $analogues) : ?>
                    <option value="<?= $analogues['drug_name'] ?>"> <?= $analogues['drug_name'] ?></option>
                <?php endforeach; ?>
            </select></br></br>
            <button type="submit" formmethod="get" formaction="/admin/work/analogues" class="btn btn-success">Привязать</button>
        </form>
    </div>


    </br></br>
    <table class="table table-bordered">
        <tr>
            <th>Название лекарства</th>
            <th>Аналог</th>
            <th>Действие</th>
        </tr>
        <?php foreach ($list_analogues as $analogues) : ?>
            <form action="/" method="GET">
                <input type="hidden" value="<?= $analogues['drug_name']  ?>" name="delete_drug_name" />
                <tr>
                    <td><?= $analogues['drug_name'] ?></td>
                    <td><?= $analogues['analogue'] ?></td>
                    <td style="width: 150px;"><button type="submit" formmethod="get" formaction="/admin/work/analogues" class="btn btn-link">Удалить</button></td>
            </form>
        <?php endforeach; ?>
    </table>
</div>