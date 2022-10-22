<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Author $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <td><?= $form->field($model, 'Name')->label('Имя автора') ?> </td>
    <td> <?= $form->field($model, 'Birthday')->input('date', ['data-date-format'=>'YYYY MMMM DD'])->label('Дата рождения автора') ?></td>
    <td> <?= $form->field($model, 'Description')->textarea(['rows'=>'6'])->label('Описание автора') ?></td>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
