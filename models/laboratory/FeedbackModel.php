<?php

namespace app\models\laboratory;

use yii\base\Model;

class FeedbackModel extends Model
{
    public ?string $name;
    public ?string $email;
    public ?int $age;
    public ?string $dateOfVisit;
    public ?int $favoriteCuisine;
    public ?int $isRecommend;
    public ?string $feedbackText;

    public function __construct()
    {
        $this->name = null;
        $this->email = null;
        $this->age = null;
        $this->dateOfVisit = null;
        $this->favoriteCuisine = 0;
        $this->isRecommend = 0;
        $this->feedbackText = null;

        parent::__construct();
    }

    public function rules()
    {
        return [
            [['name', 'email', 'feedbackText', 'dateOfVisit'], 'trim'],
            [['name', 'email', 'feedbackText'], 'required', 'message' => 'Поле обязательно для заполнения'],
            [['email', 'name', 'feedbackText'], 'string'],
            [['dateOfVisit'], 'date', 'format' => 'php:Y-m-d'],
            [['age'], 'integer', 'min' => 18, 'max' => 100, 'tooSmall' => 'Возраст должен быть от 18 лет', 'tooBig' => 'Возраст должен быть до 100 лет'],
            [['name'], 'string', 'min' => 5, 'max' => 30, 'tooShort' => 'Количество символов должно быть больше 4', 'tooLong' => 'Количество символов должно быть меньше 31'],
            [['feedbackText'], 'string', 'max' => 500, 'message' => 'Отзыв не должен превышать 500 символов'],
            [['email'], 'string', 'max' => 100, 'message' => 'Email должен быть длиной не больше 100 символов'],
            ['email', 'email', 'message' => 'Некорректный email адрес'],
        ];
    }

    public static function GetFavoriteCuisineText(int $favoriteCuisine): string
    {
        return match ($favoriteCuisine) {
            1 => "Русская кухня",
            2 => "Американская кухня",
            3 => "Немецкая кухня",
            default => "Кухня неизвестного происхождения"
        };
    }
}

enum FavoriteCuisine
{
    case Russian;
    case American;
    case German;
}
