<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Property */

$this->title = 'Actualizar propiedad: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_property]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
