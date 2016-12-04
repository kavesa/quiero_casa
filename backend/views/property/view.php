<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            'latitude',
            'longitude',
            'constructed_surface',
            'total_surface',
            'id_neighborhood',
            'id_client',
            'id_property_type',
            'bedrooms',
            'bathrooms',
            'laundry',
            'barbacoa',
            'garage',
            'backyard',
            'frontyard',
            'swimmingpool',
            'guesthouse',
        ],
    ]) ?>


</div>
