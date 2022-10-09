<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;
use app\Entities\AuthorEntity;
use app\Entities\BooksEntity;
use app\Entities\GenreEntity;
use yii\data\Pagination;

class SecondLaboratoryWorkController extends BaseController
{
    public function actionIndex(): string
    {
        return $this->render('secondLaboratoryIndex');
    }

    public function actionAuthors(): string
    {
        $authorsQuery = AuthorEntity::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $authorsQuery->count()
            ]);

        $authorsResult = $authorsQuery->orderBy('Name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('secondLaboratoryAuthorsView',
            [
                'authors' => $authorsResult,
                'pagination' => $pagination
            ]);
    }

    public function actionGenres(): string
    {
        $genreQuery = GenreEntity::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $genreQuery->count()
            ]);

        $genresResult = $genreQuery->orderBy('GenreName')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('secondLaboratoryGenresView',
            [
                'genres' => $genresResult,
                'pagination' => $pagination
            ]);
    }

    public function actionBooks(): string
    {
        $booksQuery = BooksEntity::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $booksQuery->count()
            ]);

        $booksResult = $booksQuery->orderBy('BookName')
            ->innerJoinWith(strtolower(AuthorEntity::$TableName), '"AuthorId" = "Authors"."Id"')
            ->innerJoinWith(strtolower(GenreEntity::$TableName), '"GenreId" = "Genres"."Id"')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('secondLaboratoryBooksView',
            [
                'books' => $booksResult,
                'pagination' => $pagination
            ]);
    }
}