<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lembur */

?>
<div class="lembur-view">

    <h1>Data Lembur</h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_lembur], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_lembur], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Cetak Jadwal Lembur', ['cetaklembur', 'id' => $model->id_lembur], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="thumbnail">
        <table>
            <tr>
                <td width="90%">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_lembur',
                            'nik',
                            [
                                'label' => 'Nama Karyawan',
                                'value' => function($data) {
                                    return $data->niks->nama;
                                }
                            ],
                            [
                                'label' => 'Departemen',
                                'value' => function($data) {
                                    return $data->niks->departemen;
                                }
                            ],
                            'tanggal',
                            'hari',
                            'jam_mulai_lembur',
                            'jam_akhir_lembur',
                            //'jumlah_jam_lembur',
                            //'upah_lembur',
                            //'total_upah',
                            [
                                'label' => 'Uraian Kerja',
                                'value' => function($data) {
                                    return $data->keterangan;
                                }
                            ],
                            'status',
                            //'user1',
                            //'user2',
                            //'user3',
                            //'user4',
                        ],
                    ]) ?>
                </td>
                <td align="center" valign="top">
                    <?= \PHPQRCode\QRcode::png($model->id_lembur, "uploads/qrcode/".$model->id_lembur.".png", 'L', 4, 2); ?>
                    <p>
                        <img src="uploads/qrcode/<?= $model->id_lembur ?>.png" width="200px">
                        <h5 class=""><?= $model->id_lembur ?></h5>
                    </p>
                </td>
            </tr>
        </table>
    </div>

</div>
