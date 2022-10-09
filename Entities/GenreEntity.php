<?php

namespace app\Entities;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class GenreEntity extends ActiveRecord
{
    public static string $TableName = "Genres";

    public static function tableName(): string
    {
        return self::$TableName;
    }

    public function getBook(): ActiveQuery
    {
        return $this->hasMany(BooksEntity::$TableName, ['GenreId' => 'Id']);
    }
}