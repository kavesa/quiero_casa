<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PropertyType */

$this->title = 'Crear tipo de propiedad';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de propiedad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
