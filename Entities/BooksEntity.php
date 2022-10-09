<?php

namespace app\Entities;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class BooksEntity extends ActiveRecord
{
    public static string $TableName = "Books";

    public static function tableName(): string
    {
        return self::$TableName;
    }

    public function getAuthors(): ActiveQuery
    {
        return $this->hasOne(AuthorEntity::class, ['Id' => 'AuthorId']);
    }

    public function getGenres(): ActiveQuery
    {
        return $this->hasOne(GenreEntity::class, ['Id' => 'GenreId']);
    }
}