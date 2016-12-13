<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use backend\models\Neighbourhood;
use backend\models\PropertyType;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propiedades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Propiedad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'id_neighborhood'
            ,'value'=>function($model){return $model->idNeighborhood->name;}
            ,'filter'=>ArrayHelper::map(Neighbourhood::find()->orderBy('name')->asArray()->all(), 'id', 'name')
            ,'label'=>'Barrio'
            ,
            ],
            ['attribute'=>'id_property_type'
            ,'label'=>'Tipo'
            ,'value'=>function($model){return $model->idPropertyType->description;}
            ,'filter'=>ArrayHelper::map(PropertyType::find()->orderBy('description')->asArray()->all(), 'id', 'description'),
            ],
            'id_property',
            'title',
            'short_description',
            'address',
            
            
            // 'latitude',
            // 'longitude',
            // 'constructed_surface',
            // 'total_surface',
            // 'id_neighborhood',
            // 'id_client',
            // 'id_property_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
