<?php

use app\constants\Routes;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

    <div class="alert alert-success" role="alert">
        Лабораторная работа №2. Таблица Авторы
    </div>
<?= Html::a( 'Вернуться', Yii::$app->request->referrer, ['class' => 'btn btn-outline-primary']); ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Name</th>
            <th scope="col">BirthDay</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $countRows = $pagination->offset + 1;
        foreach ($authors as $author) { ?>
            <tr>
                <th scope="row"><?= $countRows++ ?></th>
                <td><?= Html::encode("{$author["Name"]}") ?></td>
                <td><?= Html::encode("{$author["Birthday"]}") ?></td>
                <td><?= Html::encode("{$author["Description"]}") ?></td>
               <td><?= Html::a('Удалить', Routes::GetDeleteAuthorRoute($author["Id"]), ['class' => 'btn btn-danger', 'role' => 'button']) ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p class="h6">Всего найдено записей: <?= $pagination->totalCount ?></p>

<?= LinkPager::widget(
    [
        'pagination' => $pagination,
        'prevPageLabel' => false,
        'nextPageLabel' => false,
        'linkOptions' => ['class' => 'page-link'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'options' => ['class' => 'pagination pagination-circle pg-blue mb-0'],
        'view'=>'secondLaboratoryAuthorsView'
    ]
) ?>