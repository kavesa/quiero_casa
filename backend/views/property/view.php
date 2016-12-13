<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use backend\models\PropertyPrice;

/* @var $this yii\web\View */
/* @var $model backend\models\Property */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_property], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_property], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_property',
            'title',
            'short_description',
            'description',
            'address',
            'constructed_surface',
            'total_surface',
            [
                'label'  => 'Barrio',
                'value'  => $model->idNeighborhood->name,
            ],
            [
                'label'  => 'Cliente',
                'value'  => $model->idClient->name,
            ],
            [
                'label'  => 'Tipo de Propiedad',
                'value'  => $model->idPropertyType->description,
            ],
            'bedrooms',
            'bathrooms',
            'laundry:boolean',
            'barbacoa:boolean',
            'garage:boolean',
            'backyard:boolean',
            'frontyard:boolean',
            'swimmingpool:boolean',
            'guesthouse:boolean',
            [
                'attribute' => 'propertyConditions',
                'value' => Html::a('View', $model->getPropertyConditionsString($model->id_property)),
                'format' => 'raw'
            ],
            [
                'attribute' => 'propertyPrices',
                'value' => Html::a('View', $model->getPropertyPricesString($model->id_property)),
                'format' => 'raw'
            ],
        ],
    ]) ?>


</div>
