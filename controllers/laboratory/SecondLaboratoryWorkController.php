<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;
use app\Entities\AuthorEntity;
use yii\data\Pagination;

class SecondLaboratoryWorkController extends BaseController
{
    public function actionIndex() : string
    {
        return $this->render('secondLaboratoryIndex');
    }

    public function actionAuthors(): string
    {
        $authorsQuery = AuthorEntity::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $authorsQuery->count()
        ]);

        $authorsResult = $authorsQuery->orderBy('Name')
                                      ->offset($pagination->offset)
                                      ->limit($pagination->limit)
                                      ->all();

        return $this->render('secondLaboratoryAuthorsView', [
            'authors' => $authorsResult,
            'pagination' => $pagination
        ]);
    }
}