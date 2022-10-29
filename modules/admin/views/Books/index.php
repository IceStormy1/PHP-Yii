<?php

use app\constants\Routes;
use app\modules\admin\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица книг';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="books-index">
    <?= Html::a( 'Вернуться к административному модулю', Routes::GetAdminRoute(), ['class' => 'btn btn-outline-primary']); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'BookName:ntext',
            'GenreId',
            'AuthorId',
            'DateOfWriting',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id' => $model->Id]);
                 }
            ],
        ],
    ]); ?>

    <?= LinkPager::widget(
        [
            'pagination' => $pagination,
            'prevPageLabel' => false,
            'nextPageLabel' => false,
            'linkOptions' => ['class' => 'page-link'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'options' => ['class' => 'pagination pagination-circle pg-blue mb-0']
        ]
    ) ?>

</div>
