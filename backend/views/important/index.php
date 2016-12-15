<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Property;

/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\ImportantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Destacados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Destacado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'id_property'
            ,'value'=>function($model){return $model->idProperty->title;}
            ,'filter'=>ArrayHelper::map(Property::find()->orderBy('title')->asArray()->all(), 'id', 'title'),],

            'start_date',
            'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
