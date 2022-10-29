<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Genres $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="genres-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GenreName')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
