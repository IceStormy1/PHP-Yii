<?php

use app\constants\Routes;
use yii\helpers\Html;

?>

<div class="alert alert-success" role="alert">
    Лабораторная работа №2
</div>
<?= Html::a( 'Вернуться', Yii::$app->request->referrer, ['class' => 'btn btn-outline-primary']); ?>
<div class="container">
    <div class="d-grid gap-2">
        <?= Html::a('Таблица авторы', Routes::GetAuthorsRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица жанры', Routes::GetGenresRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица книги', Routes::GetBooksRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Книги, написанные в 20 веке', Routes::GetBooksInTwentiethCenturyRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Авторы и количество написанных ими книг', Routes::GetAuthorsAndTotalBooksRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Поиск автора по имени', Routes::GetFindAuthorRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
    </div>
</div>

