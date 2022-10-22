<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">

<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'PHP Labs',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            ['label' => 'Админка', 'url' => ['/admin']],
            '<li class="nav-item">
               <select style="margin-top: 1.5px" class="form-select bg-dark text-white-50 border-0 " onchange="window.location.href = \'http://web-programming-technologies/web/index.php\' + this.options[this.selectedIndex].value">
                    <option class="nav-item" VALUE="">Лабораторные работы</option>
                    <option class="nav-item" VALUE="?r=laboratory/information">Информация</option>
                    <option class="nav-item" VALUE="?r=laboratory/first-laboratory-work">Лабораторная работа №1.1</option>
                    <option class="nav-item" VALUE="?r=laboratory/first-laboratory-work%2Fpart-two">Лабораторная работа №1.2</option>
                    <option class="nav-item" VALUE="?r=laboratory/second-laboratory-work">Лабораторная работа №2</option>
                    <option class="nav-item" VALUE="?r=laboratory/third-laboratory-work">Лабораторная работа №3</option>
               </select>
            </li>',
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->UserName . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Михаил Толмачев ВИС-42 <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
