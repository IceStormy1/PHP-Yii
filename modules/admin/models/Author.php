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
            [['Id', 'Name'], 'required'],
            [['Id', 'Name', 'Birthday', 'Description'], 'string'],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'Name' => 'Name',
            'Birthday' => 'Birthday',
            'Description' => 'Description',
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
