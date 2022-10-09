<?php

namespace app\Entities;

use yii\db\ActiveRecord;

class GenreEntity extends ActiveRecord
{
    public static function tableName(): string
    {
        return "Genres";
    }
}