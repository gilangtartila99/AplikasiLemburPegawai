<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Upah */

?>
<div class="upah-view">

    <h1>Upah Lembur</h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_upah], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_upah',
            'jenis',
            'upah',
        ],
    ]) ?>

</div>
