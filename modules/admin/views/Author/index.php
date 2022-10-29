<?php

use app\constants\Routes;
use app\modules\admin\models\Author;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\AuthorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Таблица авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">
    <?= Html::a( 'Вернуться к административному модулю', Routes::GetAdminRoute(), ['class' => 'btn btn-outline-primary']); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить нового автора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'Name', 'label' => 'Имя автора', 'format' => 'text'],
            ['attribute'=>'Birthday', 'label' => 'Дата рождения', 'format' => ['date', 'php:Y-m-d']],
            ['attribute'=>'Description', 'label' => 'Описание', 'format' => 'text'],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Author $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id' => $model->Id]);
                 }
            ],
        ],
    ]); ?>

</div>
