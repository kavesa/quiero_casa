<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyCondition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-condition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_property')->textInput() ?>

    <?= $form->field($model, 'id_condition')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
