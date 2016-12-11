<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;    
use backend\models\Neighbourhood;
use backend\models\ConditionStatus;
use backend\models\Client;
use backend\models\Currency;
use backend\models\OperationType;
use backend\models\PropertyType;
use backend\widgets\FileUpload;
use kartik\checkbox\CheckboxX;

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

    <label class="control-label" for="laundry">Lavandería</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'laundry',
        'name' => 'laundry',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="barbacoa">Barbacoa</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'barbacoa',
        'name' => 'barbacoa',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="garage">Garage</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'garage',
        'name' => 'garage',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="backyard">Patio trasero</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'backyard',
        'name' => 'backyard',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="frontyard">Patio delantero</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'frontyard',
        'name' => 'frontyard',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="swimmingpool">Piscina</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'swimmingpool',
        'name' => 'swimmingpool',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <label class="control-label" for="guesthouse">Casa de huespedes</label>

    <?= CheckboxX::widget([
        'model' => $model,
        'attribute' => 'guesthouse',
        'name' => 'guesthouse',
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginLoading' => false,
    ]); 
    ?>

    <?= $form->field($model, 'id_neighborhood')->dropDownList(ArrayHelper::map(Neighbourhood::find()->all(), 'id', 'name'))->label('Barrio')  ?>

    <?= $form->field($model, 'id_client')->dropDownList(ArrayHelper::map(Client::find()->all(), 'id', 'name'))->label('Cliente')  ?>

    <?= $form->field($model, 'id_property_type')->dropDownList(ArrayHelper::map(PropertyType::find()->all(), 'id', 'description'))->label('Tipo de propiedad')  ?>


    <?= $form->field($model, 'image[]')->widget(FileInput::classname(), [
        'options'=>['multiple' => true,'accept'=>'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
    ]]); ?>

    


    <?php if ($this->context->action->id == 'create') { ?>
    <label class="control-label" >Condiciones de propiedad</label>
        <br/>
    <?php } ?>

    <?php if ($this->context->action->id == 'create') {

            echo $form->field($model, 'propertyConditions')            
     ->dropDownList(ArrayHelper::map(ConditionStatus::find()->all(), 'id', 'condition_name'), [
            'multiple'=>'multiple',
            'class'=>'',              
        ])->label(""); 
            echo $form->field($model, 'currency')->dropDownList(ArrayHelper::map(Currency::find()->all(), 'id', 'name'))->label('Moneda');
            echo $form->field($model, 'operationType')->dropDownList(ArrayHelper::map(OperationType::find()->all(), 'id', 'type'))->label('Tipo de operación');
            echo $form->field($model, 'price')->textInput();
        } 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
