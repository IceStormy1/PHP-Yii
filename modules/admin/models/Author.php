<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Authors".
 *
 * @property string $Id
 * @property string $Name
 * @property string|null $Birthday
 * @property string|null $Description
 *
 * @property Books[] $books
 */
class Author extends ActiveRecord
{
    public static string $TableName = "author";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name', 'Birthday', 'Description'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'Name' => 'Имя автора',
            'Birthday' => 'Дата рождения',
            'Description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['AuthorId' => 'Id']);
    }
}
