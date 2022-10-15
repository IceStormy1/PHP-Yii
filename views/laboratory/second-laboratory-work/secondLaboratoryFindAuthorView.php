<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\laboratory\FavoriteCuisine;
use app\models\laboratory\FeedbackModel;
use yii\widgets\ActiveForm;

?>

    <div class="alert alert-success" role="alert">
        Лабораторная работа №2. Авторы и количество написанных ими книг
    </div>

    <div class="col-lg-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= Html::a( 'Вернуться', Yii::$app->request->referrer, ['class' => 'btn btn-outline-primary']); ?>

        <?= $form->field($searchAuthorModel, 'name')->input('search', ['class'=>'form-control', 'id'=>'search-input'])->label('Имя автора', ['style' => 'margin-top: 2%']) ?>

        <div class="form-group ">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary', 'style'=>'margin-top: 3%']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
