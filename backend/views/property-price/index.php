<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Property;
use backend\models\OperationType;
use backend\models\Currency;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropertyPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Property Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-price-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Precio de Propiedad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id_property'
            ,'value'=>function($model){return $model->idProperty->title;}
            ,'filter'=>ArrayHelper::map(Property::find()->orderBy('title')->asArray()->all(), 'id', 'title'),],

            ['attribute'=>'id_operation'
            ,'value'=>function($model){return $model->idOperation->type;}
            ,'filter'=>ArrayHelper::map(OperationType::find()->orderBy('type')->asArray()->all(), 'id', 'type'),],
            ['attribute'=>'id_currency'
            ,'value'=>function($model){return $model->idCurrency->name;}
            ,'filter'=>ArrayHelper::map(Currency::find()->orderBy('name')->asArray()->all(), 'id', 'name'),],
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
