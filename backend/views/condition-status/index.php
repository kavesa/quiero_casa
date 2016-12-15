<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConditionStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Condiciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Condiciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'condition_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
