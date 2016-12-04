<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Property;
use backend\models\ConditionStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyCondition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-condition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_property')->dropDownList(ArrayHelper::map(Property::find()->all(), 'id_property', 'title'))->label('Propiedad')  ?>

    <?= $form->field($model, 'id_condition')->dropDownList(ArrayHelper::map(ConditionStatus::find()->all(), 'id', 'condition_name'))->label('Condición')  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
