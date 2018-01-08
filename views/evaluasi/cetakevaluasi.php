
<style type="text/css">
    .warna {
        color: #000000;
        background-color: transparent;
        border-style: solid;
        border-width: 2px;
        border-color: #000000;
    }
    .jarak {
        padding: 5px;
        font-size: 12px;
    }
    .padding {
        padding: 10px;
    }
    .atas {
        padding-top: 70px;
    }
</style>
<div class="atas"></div>
<div class="thumbnail padding">
    <h5 align="center"><b><u>EVALUASI HASIL KERJA LEMBUR(EHKL)</b></u></h5>

    <table width="100%">
        <tr>
            <td align="left" valign="top" width="50%">
                <p><h6>Departemen   : <?= $model->lemburs->niks->departemen ?></h6></p>
                <p><h6>Hari Lembur  : <?= $model->lemburs->hari ?></h6></p>
            </td>
            <td align="left" valign="top" width="50%">
                <p><h6>Tanggal   : <?= Yii::$app->formatter->asDate($model->lemburs->tanggal,'d MMMM Y') ?></h6></p>
            </td>
        </tr>
    </table>

    <table border="2" width="100%" class="warna">
        <tr class="warna jarak">
            <td class="warna jarak" rowspan="2" width="17%" align="center" valign="center"><b>No Lembur</b></td>
            <td class="warna jarak" rowspan="2" width="8%" align="center" valign="center"><b>NIK</b></td>
            <td class="warna jarak" rowspan="2" width="18%" align="center" valign="center"><b>Nama Karyawan</b></td>
            <td class="warna jarak" colspan="3" width="23%" align="center" valign="center"><b>Rencana Waktu</b></td>
            <td class="warna jarak" rowspan="2" width="16%" align="center" valign="center"><b>Hasil Kerja Lembur</b></td>
            <td class="warna jarak" rowspan="2" width="16%" align="center" valign="center"><b>Evaluasi</b></td>
        </tr>
        <tr class="warna jarak">
            <td class="warna jarak" align="center" valign="center"><b>Mulai</b></td>
            <td class="warna jarak" align="center" valign="center"><b>Akhir</b></td>
            <td class="warna jarak" align="center" valign="center"><b>Jam/Menit</b></td>
        </tr>
        
        <tr class="warna jarak" height="100%">
            <td class="warna jarak" align="center" valign="center">
                <img src="uploads/qrcode/<?= $model->id_lembur ?>.png" width="100px">
                <h6 class=""><?= $model->id_lembur ?></h6>
            </td>
            <td class="warna jarak" align="left" valign="top"><?= $model->lemburs->nik ?></td>
            <td class="warna jarak" align="left" valign="top"><?= $model->lemburs->niks->nama ?></td>
            <td class="warna jarak" align="left" valign="top"><?= $model->lemburs->jam_mulai_lembur ?></td>
            <td class="warna jarak" align="left" valign="top"><?= $model->lemburs->jam_akhir_lembur ?></td>
            <td class="warna jarak" align="left" valign="top"><?= $model->lemburs->jumlah_jam_lembur ?></td>
            <td class="warna jarak" align="justify" valign="top"><?= $model->hasil_kerja_lembur ?></td>
            <td class="warna jarak" align="justify" valign="top"><?= $model->evaluasi ?></td>
        </tr>
    </table>
    <h6 align="justify">*Setelah mencetak surat evaluasi kerja lembur ini, silahkan konfirmasi ke Kepala Seksi/Departemen, Kepala Divisi/Direktur, HNN/ANI dan HRD agar dapat diproses upah kerja lembur yang akan diperoleh</h6>
</div>