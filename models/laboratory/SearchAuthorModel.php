<?php

namespace app\models\laboratory;

use yii\base\Model;

class SearchAuthorModel extends Model
{
    public ?string $name;

    public function __construct()
    {
        $this->name = null;

        parent::__construct();
    }

    public function rules()
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required', 'message' => 'Поле обязательно для заполнения'],
        ];
    }
}
