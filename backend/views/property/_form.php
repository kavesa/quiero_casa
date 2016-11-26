<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;    
use backend\models\Neighbourhood;
use backend\models\Client;
use backend\models\PropertyType;
use backend\widgets\FileUpload;

use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Property */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="property-form">

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
    ]); 

    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'constructed_surface')->textInput() ?>

    <?= $form->field($model, 'total_surface')->textInput() ?>

    <?= $form->field($model, 'bedrooms')->textInput() ?>
    <?= $form->field($model, 'bathrooms')->textInput() ?>
    <?= $form->field($model, 'laundry')->textInput() ?>
    <?= $form->field($model, 'barbacoa')->textInput() ?>
    <?= $form->field($model, 'garage')->textInput() ?>
    <?= $form->field($model, 'backyard')->textInput() ?>
    <?= $form->field($model, 'frontyard')->textInput() ?>
    <?= $form->field($model, 'swimmingpool')->textInput() ?>
    <?= $form->field($model, 'guesthouse')->textInput() ?>
    

    <?= $form->field($model, 'id_neighborhood')->dropDownList(ArrayHelper::map(Neighbourhood::find()->all(), 'id', 'name'))->label('Barrio')  ?>

    <?= $form->field($model, 'id_client')->dropDownList(ArrayHelper::map(Client::find()->all(), 'id', 'name'))->label('Cliente')  ?>

    <?= $form->field($model, 'id_property_type')->dropDownList(ArrayHelper::map(PropertyType::find()->all(), 'id', 'description'))->label('Tipo de propiedad')  ?>


    <?= $form->field($model, 'image[]')->widget(FileInput::classname(), [
        'options'=>['multiple' => true,'accept'=>'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
    ]]); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
