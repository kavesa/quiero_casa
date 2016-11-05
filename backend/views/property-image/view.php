<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyImage */

$this->title = $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Property Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_property' => $model->id_property, 'image' => $model->image], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_property' => $model->id_property, 'image' => $model->image], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_property',
            'image',
        ],
    ]) ?>

</div>
