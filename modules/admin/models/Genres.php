<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Genres".
 *
 * @property string $Id
 * @property string|null $GenreName
 *
 * @property Books[] $books
 */
class Genres extends \yii\db\ActiveRecord
{
    public static string $TableName = "genre";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GenreName'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'GenreName' => 'Жанр',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['GenreId' => 'Id']);
    }
}
