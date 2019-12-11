<?php

namespace app\models;

use yii\web\UploadedFile;
use yii\base\Model;

class Preparat extends Model
{
    public $drug_name;
    public $description;
    public $price;
    public $img;
    public $image;

    public function attributeLabels()
    {
        return [
            'drug_name' => 'Название лекарства',
            'description' => 'Описание',
            'price' => 'Цена',
            'img' => 'Изображение',
        ];
    }
    public function rules()
    {
        return [
            [['drug_name', 'description', 'price', 'img'], 'required'],
            ['drug_name', 'string', 'length' => [1, 100]],
            ['description', 'string', 'length' => [1, 255]],
            ['price', 'integer', 'max' => 10000],
            ['img', 'string', 'length' => [5, 150]],
        ];
    }
}
