<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lembur */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.kotak {
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    color: #FFFFFF;
    background-color: #343333;
    border-style: solid;
    border-width: 7px;
    border-color: #005DFE;
    opacity: 0.9;
}
</style>
<div class="lembur-form thumbnail kotak">
<center>
    <h1>Input Data Lembur</h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->hiddenInput()->label(false) ?>

    <div class="col-lg-6">
        <?= $form->field($model, 'tanggal')->textInput(['placeholder' => 'Tanggal Lembur'])->label(false) ?>
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'hari')->textInput(['placeholder' => 'Hari Lembur'])->label(false) ?>
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'jam_mulai_lembur')->textInput(['placeholder' => 'Jam Mulai Lembur'])->label(false) ?>
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'jam_akhir_lembur')->textInput(['placeholder' => 'Jam Akhir Lembur'])->label(false) ?>
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'jumlah_jam_lembur')->textInput(['placeholder' => 'Jumlah Jam Lembur'])->label(false) ?>
    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'total_upah')->textInput(['placeholder' => 'Total Upah'])->label(false) ?>
    </div>

    <div class="col-lg-12">
        <?= $form->field($model, 'keterangan')->textArea(['rows' => 5, 'placeholder' => 'Uraian Kerja Lembur'])->label(false) ?>
    </div>

    <?= $form->field($model, 'status')->hiddenInput(['value' => 'Pending'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</center>
</div>
