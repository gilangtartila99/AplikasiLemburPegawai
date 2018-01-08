<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
.warna {
    background-color: #343333;
    border-style: solid;
    border-width: 7px;
    border-color: #005DFE;
}
</style>
<div class="evaluasi-form">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

    <?php
	    $lembur = Html::getInputId($model, 'id_lembur');
	?>

	<div class="thumbnail warna">
		<table style="margin-top: 20px;">
			<tr width="100%">
				<td width="40%">
					<?= odaialali\qrcodereader\QrReader::widget([
				        'id' => 'qrInput',
				        'successCallback' => "function(data){ 
				        	$('#my-form-id #{$lembur}').val(data);
				        	$('#my-form-id #qrInput').val(data); 
				        }"
				    ]); ?>
				</td>
				<td width="40%">
					<p><?= $form->field($model, 'id_lembur')->textInput(['placeholder' => 'Klik Disini!']) ?></p>

				    <p><?= $form->field($model, 'hasil_kerja_lembur')->textArea(['rows' => 5]) ?></p>

				    <p><?= $form->field($model, 'evaluasi')->textArea(['rows' => 5]) ?></p>

					<div class="form-group" align="center">
        				<?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
				    </div>
				</td>
			</tr>
		</table>
	</div>

    <?php ActiveForm::end(); ?>

</div>
