<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyCondition */

$this->title = $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Property Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-condition-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_property' => $model->id_property, 'id_condition' => $model->id_condition], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_property' => $model->id_property, 'id_condition' => $model->id_condition], [
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
            'id_condition',
        ],
    ]) ?>

</div>
