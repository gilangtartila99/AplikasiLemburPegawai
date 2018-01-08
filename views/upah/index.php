<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UpahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Upahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id_upah',
            'jenis',
            'upah',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
