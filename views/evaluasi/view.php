<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */

?>
<div class="evaluasi-view">

    <h1>Evaluasi Kerja Lembur</h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_evaluasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_evaluasi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Cetak Bukti Evaluasi', ['cetakevaluasi', 'id' => $model->id_evaluasi], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_evaluasi',
            'id_lembur',
            'hasil_kerja_lembur',
            'evaluasi',
        ],
    ]) ?>

</div>
