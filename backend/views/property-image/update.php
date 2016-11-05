<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyImage */

$this->title = 'Update Property Image: ' . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Property Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_property, 'url' => ['view', 'id_property' => $model->id_property, 'image' => $model->image]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="property-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
