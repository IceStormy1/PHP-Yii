<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

    <div class="alert alert-success" role="alert">
        Лабораторная работа №2. <?=$nameView ?>
    </div>
<?= Html::a( 'Вернуться', Yii::$app->request->referrer, ['class' => 'btn btn-outline-primary']); ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">BookName</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">DateOfWriting</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $countRows = $pagination->offset + 1;
        foreach ($books as $book) { ?>
            <tr>
                <th scope="row"><?= $countRows++ ?></th>
                <td><?= Html::encode("{$book->BookName}") ?></td>
                <td><?= Html::encode("{$book->authors->Name}") ?></td>
                <td><?= Html::encode("{$book->genres->GenreName}") ?></td>
                <td><?= Html::encode("{$book->DateOfWriting}") ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?= LinkPager::widget(
    [
        'pagination' => $pagination,
        'prevPageLabel' => false,
        'nextPageLabel' => false,
        'linkOptions' => ['class' => 'page-link'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'options' => ['class' => 'pagination pagination-circle pg-blue mb-0']
    ]
) ?>