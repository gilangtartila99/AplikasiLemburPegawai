<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="userss-index">

    <h1>Data User</h1>

    <p>
        <?= Html::a('Buat User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            'nik',
            'username',
            //'password',
            //'authKey',
            // 'accessToken',
            'nama',
            // 'no_ktp',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'alamat',
            'no_telp',
            'jabatan',
            'departemen',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
