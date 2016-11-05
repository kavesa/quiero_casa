<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyPrice */

$this->title = 'Update Property Price: ' . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Property Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_property, 'url' => ['view', 'id_property' => $model->id_property, 'id_operation' => $model->id_operation, 'id_currency' => $model->id_currency]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="property-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
