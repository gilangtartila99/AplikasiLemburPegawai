<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userss */

?>
<div class="userss-view">

    <h1>Data <?= $model->nama ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nik',
            'username',
            'password',
            //'authKey',
            //'accessToken',
            'nama',
            'no_ktp',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_telp',
            'role',
        ],
    ]) ?>

</div>
