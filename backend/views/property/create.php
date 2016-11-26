<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Property */

$this->title = 'Crear Propiedad';
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
