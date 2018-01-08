<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LemburSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="lembur-index">

    <h1>Data Lembur</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(Yii::$app->user->identity->role === 1) { ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id_lembur',
                    'nik',
                    'tanggal',
                    'hari',
                    'jam_mulai_lembur',
                    'jam_akhir_lembur',
                    // 'jumlah_jam_lembur',
                    // 'upah_lembur',
                    // 'total_upah',
                    'keterangan',
                    'status',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                    ],
                ],
            ]); ?>
        <?php } elseif(Yii::$app->user->identity->role === 2) { ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [

                    'id_lembur',
                    'nik',
                    'tanggal',
                    'hari',
                    'jam_mulai_lembur',
                    'jam_akhir_lembur',
                    // 'jumlah_jam_lembur',
                    // 'upah_lembur',
                    // 'total_upah',
                    'keterangan',
                    'status',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{approve}',  // the default buttons + your custom button
                        'buttons' => [
                            'approve' => function($url, $model, $key) {     // render your custom button
                                return Html::a('Approve', ['approve', 'id' => $model->id_lembur], ['class' => 'btn btn-primary']);
                            }
                        ],
                    ],
                ],
            ]); ?>
        <?php } else { ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [

                    'id_lembur',
                    'nik',
                    'tanggal',
                    'hari',
                    'jam_mulai_lembur',
                    'jam_akhir_lembur',
                    // 'jumlah_jam_lembur',
                    // 'upah_lembur',
                    // 'total_upah',
                    'keterangan',
                    'status',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{cetak} {evaluasi}',  // the default buttons + your custom button
                        'buttons' => [
                            'cetak' => function($url, $model, $key) {     // render your custom button
                                if($model->user1 != NULL OR $model->user2 != NULL OR $model->user3 != NULL OR $model->user4 != NULL) {
                                    return 
                                        '<p>' . Html::a('Cetak Bukti Approved', ['cetaklembur', 'id' => $model->id_lembur], ['class' => 'btn btn-primary']) . '</p>';
                                } else {
                                    return 'Silahkan Selesaikan Konfirmasi Anda!';
                                }
                            },
                            'evaluasi' => function($url, $model, $key) {     // render your custom button
                                if($model->user1 != NULL OR $model->user2 != NULL OR $model->user3 != NULL OR $model->user4 != NULL) {
                                    return
                                        '<p>' . Html::a('Evaluasi Kerja Lembur', ['evaluasi/create'], ['class' => 'btn btn-danger']) . '</p>';
                                } else {
                                    return 'Silahkan Selesaikan Konfirmasi Anda!';
                                }
                            }
                        ],
                    ],
                ],
            ]); ?>
        <?php } ?>
</div>
