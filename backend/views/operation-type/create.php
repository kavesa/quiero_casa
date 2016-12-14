<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OperationType */

$this->title = 'Crear Tipo de Operación';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Operación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
