<?php

namespace app\Entities;

use yii\db\ActiveRecord;

class AuthorEntity extends ActiveRecord
{
    public static function tableName(): string
    {
        return "Authors";
    }
}