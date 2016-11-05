<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PropertyImage */

$this->title = 'Create Property Image';
$this->params['breadcrumbs'][] = ['label' => 'Property Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
