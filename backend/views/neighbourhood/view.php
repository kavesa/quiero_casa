<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;    
use backend\models\State;

/* @var $this yii\web\View */
/* @var $model backend\models\Neighbourhood */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Barrios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="neighbourhood-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'  => 'Departamento',
                'value'  => $model->idState->name,
            ],
            [
                'label'  => 'Nombre',
                'value'  => $model->name,
            ],
        ],
    ]) ?>

</div>
