<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ConditionStatus */

$this->title = 'Crear Condiciones';
$this->params['breadcrumbs'][] = ['label' => 'Condiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
