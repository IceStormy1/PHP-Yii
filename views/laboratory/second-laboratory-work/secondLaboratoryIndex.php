<?php

use app\constants\Routes;
use yii\helpers\Html;

?>

<div class="alert alert-success" role="alert">
    Лабораторная работа №2
</div>

<div class="container">
    <div class="d-grid gap-2">
        <?= Html::a('Таблица авторы', Routes::GetAuthorsRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица жанры', Routes::GetSecondLaboratoryRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица книги', Routes::GetSecondLaboratoryRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
    </div>
</div>

