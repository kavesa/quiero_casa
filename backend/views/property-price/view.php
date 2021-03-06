<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyPrice */

$this->title = $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-price-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_property' => $model->id_property, 'id_operation' => $model->id_operation, 'id_currency' => $model->id_currency], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id_property' => $model->id_property, 'id_operation' => $model->id_operation, 'id_currency' => $model->id_currency], [
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
            'id_operation',
            'id_currency',
            'price',
        ],
    ]) ?>

</div>
