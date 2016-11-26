<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\State;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NeighbourhoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barrios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="neighbourhood-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Barrio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'id_state'
            ,'value'=>function($model){return $model->idState->name;}
            ,'filter'=>ArrayHelper::map(State::find()->orderBy('name')->asArray()->all(), 'id', 'name'),],

            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
