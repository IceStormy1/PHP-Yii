<?php

use app\models\laboratory\FavoriteCuisine;
use app\models\laboratory\FeedbackModel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="alert alert-success" role="alert">
    Лабораторная работа №1.2
</div>

<div class="container">
    <p class="display-6">Отзыв о ресторане</p>
    <div class="row">
    <div class="col-lg-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($feedbackModel, 'name')->label('Ваше имя') ?>
        <?= $form->field($feedbackModel, 'email')->label('Ваш Email', ['style'=>'margin-top: 2%']) ?>
        <?= $form->field($feedbackModel, 'age')->label('Ваш возраст', ['style'=>'margin-top: 2%']) ?>
        <?= $form->field($feedbackModel, 'dateOfVisit')->input('date', ['data-date-format'=>'YYYY MMMM DD'])->label('Дата посещения', ['style'=>'margin-top: 2%']) ?>
        <?= $form->field($feedbackModel, 'favoriteCuisine')->dropDownList([
                1 => FeedbackModel::GetFavoriteCuisineText(1),
                2 => FeedbackModel::GetFavoriteCuisineText(2),
                3 => FeedbackModel::GetFavoriteCuisineText(3)],
                ['selected'=>$feedbackModel->favoriteCuisine])
            -> label('Любимая кухня', ['style'=>'margin-top: 2%']) ?>
        <?= $form->field($feedbackModel, 'isRecommend')->radioList([true => 'Да', false => 'Нет'])->label('Порекомендуете нас друзьям?', ['style'=>'margin-top: 2%']) ?>
        <?= $form->field($feedbackModel, 'feedbackText')->textarea()->label('Текст отзыва:', ['style'=>'margin-top: 2%']) ?>

        <div class="form-group ">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'style'=>'margin-top: 5%']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?php if(!is_null($feedbackModel->name))
          {?>
            <div class="col-lg-6">
                <p class="display-6">Отзыв о ресторане</p>
                <p class="display-7"><b>Ваше имя </b><?= $feedbackModel->name ?></p>
                <p class="display-7"><b>Ваш email </b><?= $feedbackModel->email ?></p>
                <p class="display-7"><b>Дата посещения </b><?= date("d.m.Y", strtotime($feedbackModel->dateOfVisit)) ?></p>
                <p class="display-7"><b>Ваш возраст </b><?= $feedbackModel->age ?></p>
                <p class="display-7"><b>Любимая кухня </b><?= FeedbackModel::GetFavoriteCuisineText($feedbackModel->favoriteCuisine) ?></p>
                <p class="display-7"><b>Порекомендуете нас друзьям? </b><?= $feedbackModel->isRecommend == 0 ? 'Нет' : 'Да' ?></p>
                <p class="display-7"><b>Текст отзыва: </b><?= $feedbackModel->feedbackText ?></p>
            </div>
    <?php } ?>

    </div>

</div>
