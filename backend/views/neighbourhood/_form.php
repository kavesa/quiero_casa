<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;	
use backend\models\State;

/* @var $this yii\web\View */
/* @var $model backend\models\Neighbourhood */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="neighbourhood-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_state')->dropDownList(ArrayHelper::map(State::find()->all(), 'id', 'name'))->label('Departamento')  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
