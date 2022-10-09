<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;
use app\Entities\AuthorEntity;
use app\Entities\GenreEntity;
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

    public function actionGenres(): string
    {
        $authorsQuery = GenreEntity::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $authorsQuery->count()
        ]);

        $authorsResult = $authorsQuery->orderBy('GenreName')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('secondLaboratoryGenresView', [
            'genres' => $authorsResult,
            'pagination' => $pagination
        ]);
    }
}