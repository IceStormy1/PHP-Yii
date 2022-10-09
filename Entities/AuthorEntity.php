<?php

namespace app\Entities;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class AuthorEntity extends ActiveRecord
{
    public static string $TableName = "Authors";

    public static function tableName(): string
    {
        return self::$TableName;
    }

    public function getBook(): ActiveQuery
    {
        return $this->hasMany(BooksEntity::$TableName, ['AuthorId' => 'Id']);
    }
}