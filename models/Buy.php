<?php

namespace app\models;

use yii\base\Model;

class Buy extends Model
{
    public $firstname;
    public $surname;
    public $patronymic;
    public $drug_name;
    public $quantity;
    public $num_store;
    public $phone;
    public $date_buy;

    public function attributeLabels()
    { 
        return [
            'firstname' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'quantity' => 'Количество',
            'phone' => 'Телефон',
        ];
    }

    public function rules()
    {
        return [
            [['firstname', 'surname', 'patronymic', 'quantity', 'phone'], 'required'],
            ['firstname', 'string', 'length' => [2,100]],
            ['surname', 'string', 'length' => [2,100]],
            ['patronymic', 'string', 'length' => [2,100]],
            ['quantity', 'integer', 'max' => 5],
            ['phone', 'string', 'length' => [5,20]],
        ];
    }
}
