<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PropertyPrice */

$this->title = 'Crear Precio de Propiedad';
$this->params['breadcrumbs'][] = ['label' => 'Precios de Propiedad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
