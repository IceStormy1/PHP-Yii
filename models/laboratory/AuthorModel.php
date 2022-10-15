<?php

namespace app\models\laboratory;

class AuthorModel extends \yii\base\Model
{
    public ?string $name;
    public ?string $birthDay;
    public ?string $description;

    public function __construct()
    {
        $this->name = null;
        $this->description = null;
        $this->birthDay= null;

        parent::__construct();
    }

    public function rules()
    {
        return [
            [['name', 'description', 'birthDay'], 'trim'],
            [['name'], 'required', 'message' => 'Поле обязательно для заполнения'],
            [['name', 'description'], 'string'],
            [['birthDay'], 'date', 'format' => 'php:Y-m-d'],
            [['name'], 'string', 'min' => 5, 'max' => 30, 'tooShort' => 'Количество символов должно быть больше 4', 'tooLong' => 'Количество символов должно быть меньше 31'],
            [['description'], 'string', 'max' => 500, 'message' => 'Отзыв не должен превышать 500 символов'],
        ];
    }
}