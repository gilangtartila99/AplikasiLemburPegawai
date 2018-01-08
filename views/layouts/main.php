<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Aplikasi Lembur</title>
    <?php $this->head() ?>
<style type="text/css">
/* navbar */
.navbarku {
    background-color: #343333;
    border-style: solid;
    border-bottom-width: 7px;
    border-bottom-color: #005DFE;
}
/* title */
.navbarku .navbar-brand {
    color: #FFFFFF;
}
.navbarku .navbar-brand:hover,
.navbarku .navbar-brand:focus {
    color: #FFFFFF;
}
/* link */
.navbarku .navbar-nav > li > a {
    color: #FFFFFF;
}
.navbarku .navbar-nav > li > a:hover,
.navbarku .navbar-nav > li > a:focus {
    color: #333;
}
.navbarku .navbar-nav > .active > a, 
.navbarku .navbar-nav > .active > a:hover, 
.navbarku .navbar-nav > .active > a:focus {
    color: #FFFFFF;
    background-color: #005DFE;
}
.navbarku .navbar-nav > .open > a, 
.navbarku .navbar-nav > .open > a:hover, 
.navbarku .navbar-nav > .open > a:focus {
    color: #FFFFFF;
    background-color: #005DFE;
}
/* caret */
.navbarku .navbar-nav > .dropdown > a .caret {
    border-top-color: #FFFFFF;
    border-bottom-color: #FFFFFF;
}
.navbarku .navbar-nav > .dropdown > a:hover .caret,
.navbarku .navbar-nav > .dropdown > a:focus .caret {
    border-top-color: #333;
    border-bottom-color: #333;
}
.navbarku .navbar-nav > .open > a .caret, 
.navbarku .navbar-nav > .open > a:hover .caret, 
.navbarku .navbar-nav > .open > a:focus .caret {
    border-top-color: #FFFFFF;
    border-bottom-color: #FFFFFF;
}
/* mobile version */
.navbarku .navbar-toggle {
    border-color: #DDD;
}
.navbarku .navbar-toggle:hover,
.navbarku .navbar-toggle:focus {
    background-color: #DDD;
}
.navbarku .navbar-toggle .icon-bar {
    background-color: #CCC;
}
@media (max-width: 767px) {
    .navbarku .navbar-nav .open .dropdown-menu > li > a {
        color: #005DFE;
    }
    .navbarku .navbar-nav .open .dropdown-menu > li > a:hover,
    .navbarku .navbar-nav .open .dropdown-menu > li > a:focus {
        color: #333;
    }
}

a {
    color: #005DFE;
}

.warna {
    color: #FFFFFF;
    background-color: #343333;
    border-style: solid;
    border-top-width: 7px;
    border-top-color: #005DFE;
    border-bottom-width: 7px;
    border-left-width: 7px;
    border-right-width: 7px;
    border-bottom-color: #343333;
    border-left-color: #343333;
    border-right-color: #343333;
}

</style>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Aplikasi Lembur',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbarku',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            ['label' => 'Login', 'url' => ['/site/login']],
        ];
    } elseif (Yii::$app->user->identity->role === 1) {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            ['label' => 'Data User', 'url' => ['/users/index']],
            ['label' => 'Upah Lembur', 'url' => ['/upah/view', 'id' => 2]],
            ['label' => 'Data Lembur', 'url' => ['/lembur/index']],
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'method' => 'POST'],
        ];
    } elseif (Yii::$app->user->identity->role === 2) {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            ['label' => 'Approved Lembur', 'url' => ['/lembur/search']],
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'method' => 'POST'],
        ];
    } else {
        $menu = [
            ['label' => 'Halaman Utama', 'url' => ['/site/index']],
            [
            'label' => 'Jadwal Lembur',
                'items' => [
                    ['label' => 'Input Jadwal Lembur', 'url' => ['/lembur/create']],
                    ['label' => 'Lihat Jadwal Lembur', 'url' => ['/lembur/search']],
                ],
            ],
            //['label' => 'Evaluasi Lembur', 'url' => ['/evaluasi/create']],
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'method' => 'POST'],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer warna">
    <div class="container">
        <p class="pull-left">&copy; Aplikasi Lembur <?php echo date('Y') ?></p>

        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
