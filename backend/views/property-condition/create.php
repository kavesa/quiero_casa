<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PropertyCondition */

$this->title = 'Create Property Condition';
$this->params['breadcrumbs'][] = ['label' => 'Property Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-condition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
