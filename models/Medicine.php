<?php

namespace app\models;
use yii\db\ActiveRecord;

class Medicine extends ActiveRecord
{
    public static function tableName()
    {
      return 'medicines';  
    }   
}