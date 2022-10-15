<?php

namespace app\controllers\laboratory;

use app\constants\Routes;
use app\controllers\BaseController;
use app\Entities\AuthorEntity;
use app\Entities\BooksEntity;
use app\Entities\GenreEntity;
use app\models\laboratory\AuthorModel;
use app\models\laboratory\SearchAuthorModel;
use Yii;
use yii\data\Pagination;
use yii\db\Query;

class SecondLaboratoryWorkController extends BaseController
{
    public function actionIndex(): string
    {
        return $this->render('secondLaboratoryIndex');
    }

    public function actionAuthors(): string
    {
        return $this->GetAuthorsByParameters(null);
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
                'pagination' => $pagination,
                'nameView' => 'Таблица книги'
            ]);
    }

    public function actionTwentiethCentury(): string
    {
        $booksQuery = BooksEntity::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $booksQuery->count()
            ]);

        $booksResult = $booksQuery
            ->innerJoinWith(strtolower(AuthorEntity::$TableName), '"AuthorId" = "Authors"."Id"')
            ->innerJoinWith(strtolower(GenreEntity::$TableName), '"GenreId" = "Genres"."Id"')
            ->where('"DateOfWriting" > \'1900-01-01\' and "DateOfWriting" < \'2000-01-01\'')
            ->orderBy('DateOfWriting')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('secondLaboratoryBooksView',
            [
                'books' => $booksResult,
                'pagination' => $pagination,
                'nameView' => 'Книги, написанные в 20 веке'
            ]);
    }

    public function actionAuthorsAndTotalBooks(): string
    {
        $authorsQuery = (new Query())->from('"Authors"')
                        ->leftJoin(BooksEntity::$TableName, '"Authors"."Id" = "Books"."AuthorId"')
                        ->groupBy(['"Authors"."Id", "Authors"."Name"'])
                        ->select([ 'Name','Count("Books"."Id") As CountBooks']);

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $authorsQuery->count()
            ]);

        $authorsResult = $authorsQuery
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('Name')
            ->all();

        return $this->render('secondLaboratoryAuthorsAndTotalBooksView',
            [
                'authors' => $authorsResult,
                'pagination' => $pagination
            ]);
    }

    public function actionFindAuthor(): string
    {
       $searchAuthorModel = new SearchAuthorModel();

        if (($searchAuthorModel->load(Yii::$app->request->post()) && $searchAuthorModel->validate()) || array_key_exists('page', $_GET))
            return $this->GetAuthorsByParameters($searchAuthorModel);

        return $this->render('secondLaboratoryFindAuthorView',
            [
                'searchAuthorModel' => $searchAuthorModel,
            ]
        );
    }

    public function actionDeleteAuthor(): \yii\web\Response
    {
        $authorsQuery = AuthorEntity::deleteAll(sprintf('"Id" =\'%s\' ', $_GET['authorId']));

        return $this->redirect(Routes::GetAuthorsRoute());
    }

    public function actionSaveAuthor(): \yii\web\Response|string
    {
        $authorModel = new AuthorModel();

        if(!$authorModel->load(Yii::$app->request->post()))
            return $this->GetAuthorsByParameters(null);

        $authorEntity = new AuthorEntity();

        $authorEntity["Description"] = $authorModel->description;
        $authorEntity["Name"] = $authorModel->name;
        $authorEntity["Birthday"] = $authorModel->birthDay;

        $authorEntity->save();

        return $this->redirect(Routes::GetAuthorsRoute());
    }

    private function GetAuthorsByParameters(?SearchAuthorModel $searchAuthorModel): string
    {
        $authorsQuery = AuthorEntity::find();

        if(!is_null($searchAuthorModel) && !is_null($searchAuthorModel->name))
            $authorsQuery->where(['like', 'LOWER("Name")', '%'. strtolower($searchAuthorModel->name) . '%', false]);

        $pagination = new Pagination(
            [
                'defaultPageSize' => 5,
                'totalCount' => $authorsQuery->count()
            ]);

        $authorsResult = $authorsQuery->orderBy('Name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $authorModel = new AuthorModel();

        return $this->render('secondLaboratoryAuthorsView',
            [
                'authors' => $authorsResult,
                'pagination' => $pagination,
                'authorModel' => $authorModel
            ]);
    }
}