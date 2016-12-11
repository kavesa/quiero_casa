<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;    
use backend\models\Property;
use backend\models\OperationType;
use backend\models\Currency;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertyPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_property')->dropDownList(ArrayHelper::map(Property::find()->all(), 'id_property', 'title'))->label('Propiedad')  ?>

    <?= $form->field($model, 'id_operation')->dropDownList(ArrayHelper::map(OperationType::find()->all(), 'id', 'type'))->label('Operación')  ?>

    <?= $form->field($model, 'id_currency')->dropDownList(ArrayHelper::map(Currency::find()->all(), 'id', 'name'))->label('Moneda')  ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
