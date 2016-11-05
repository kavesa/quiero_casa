<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyCondition */

$this->title = 'Update Property Condition: ' . $model->id_property;
$this->params['breadcrumbs'][] = ['label' => 'Property Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_property, 'url' => ['view', 'id_property' => $model->id_property, 'id_condition' => $model->id_condition]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="property-condition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
