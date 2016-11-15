<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de propiedad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
            'id',
            [
                'label'  => 'Descripción',
                'value'  => $model->description,
            ],
        ],
    ]) ?>

</div>
