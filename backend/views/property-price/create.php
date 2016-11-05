<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PropertyPrice */

$this->title = 'Create Property Price';
$this->params['breadcrumbs'][] = ['label' => 'Property Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
