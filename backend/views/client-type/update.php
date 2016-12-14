<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientType */

$this->title = 'Actualizar Tipo de Cliente: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Cliente', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="client-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
