<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationType */

$this->title = 'Update Operation Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operation-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
