<?php

use app\constants\Routes;
use app\modules\admin\models\Genres;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\GenreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица жанры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genres-index">
    <?= Html::a( 'Вернуться к административному модулю', Routes::GetAdminRoute(), ['class' => 'btn btn-outline-primary']); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый жанр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GenreName:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Genres $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id' => $model->Id]);
                 }
            ],
        ],
    ]); ?>


</div>
