<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Books".
 *
 * @property string $Id
 * @property string|null $BookName
 * @property string $GenreId
 * @property string $AuthorId
 * @property string|null $DateOfWriting
 *
 * @property Author $author
 * @property Genres $genre
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'GenreId', 'AuthorId'], 'required'],
            [['Id', 'BookName', 'GenreId', 'AuthorId'], 'string'],
            [['DateOfWriting'], 'safe'],
            [['Id'], 'unique'],
            [['AuthorId'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['AuthorId' => 'Id']],
            [['GenreId'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::class, 'targetAttribute' => ['GenreId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'BookName' => 'Название',
            'GenreId' => 'Genre ID',
            'AuthorId' => 'Author ID',
            'DateOfWriting' => 'Дата написания',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['Id' => 'AuthorId']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genres::class, ['Id' => 'GenreId']);
    }
}
