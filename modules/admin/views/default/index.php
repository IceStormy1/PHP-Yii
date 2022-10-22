<?php

use app\constants\Routes;
use yii\helpers\Html;

?>

<div class="alert alert-success" role="alert">
    Административный модуль
</div>
<?= Html::a( 'Вернуться', Yii::$app->request->referrer, ['class' => 'btn btn-outline-primary']); ?>
<div class="container">
    <div class="d-grid gap-2">
        <?= Html::a('Таблица авторы', Routes::GetAdminAuthorRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица жанры', Routes::GetAdminGenresRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
        <?= Html::a('Таблица книги', Routes::GetAdminBooksRoute(), ['class' => 'btn btn-primary btn-md', 'role' => 'button']) ?>
    </div>
</div>