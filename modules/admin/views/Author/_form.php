<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Author $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Birthday')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
