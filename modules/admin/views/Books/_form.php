<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Books $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BookName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'GenreId')->textInput() ?>

    <?= $form->field($model, 'AuthorId')->textInput() ?>

    <?= $form->field($model, 'DateOfWriting')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
