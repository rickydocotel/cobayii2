<?php

namespace app\models;

use yii\db\ActiveRecord;

class Teams extends ActiveRecord
{
    public $teamsCount;

    public static function tableName()
    {
        return 'sppt';
    }
}