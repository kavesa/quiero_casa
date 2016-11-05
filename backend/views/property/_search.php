<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_property') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'short_description') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'constructed_surface') ?>

    <?php // echo $form->field($model, 'total_surface') ?>

    <?php // echo $form->field($model, 'id_neighborhood') ?>

    <?php // echo $form->field($model, 'id_client') ?>

    <?php // echo $form->field($model, 'id_property_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
