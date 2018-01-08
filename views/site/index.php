<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

?>
<div class="site-index">
<?php if (Yii::$app->user->isGuest) { ?>
    <div class="jumbotron">
        <h1>Aplikasi Lembur</h1>

        <p><?= Html::a('Login Sekarang', ['site/login'], ['class' => 'btn-lg btn-primary']) ?></p>
    </div>
<?php } elseif (Yii::$app->user->identity->role === 1) { ?>
    <div class="jumbotron">
        <h1>Admin Aplikasi Lembur</h1>
    </div>
<?php } elseif (Yii::$app->user->identity->role === 2) { ?>
    <div class="jumbotron">
        <h1>Aplikasi Lembur</h1>

        <p><?= Html::a('Approve Jadwal Lembur', ['lembur/search'], ['class' => 'btn-lg btn-primary']) ?></p>
    </div>
<?php } else { ?>
    <div class="jumbotron">
        <h1>Aplikasi Lembur</h1>

        <p><?= Html::a('Input Jadwal Lembur', ['lembur/create'], ['class' => 'btn-lg btn-primary']) ?></p>
    </div>
<?php } ?>
</div>
