<?php

namespace app\models;

use yii\base\Model;

class Control extends Model
{ 
    public $surname;
    public $store;
    public $start;
    public $finish;
    public function attributeLabels()
    { 
        return [
            'surname' => 'Фамилия проверяющего',
            'store' => 'Номер склада',
            'start' => 'Количество в начале дня',
            'finish' => 'Количество в конце дня',
        ];
    }

    public function rules()
    {
        return [
            [['surname', 'store', 'start', 'finish'], 'required'],
            ['surname', 'string', 'length' => [2,50]],
            ['store', 'integer','min' => 1 , 'max' => 2],
            ['start', 'integer', 'max' => 500],
            ['finish', 'integer', 'max' => 500],
        ];
    }
}
