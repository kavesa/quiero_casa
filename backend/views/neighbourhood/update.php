<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Neighbourhood */

$this->title = 'Actualizar Neighbourhood: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Neighbourhoods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="neighbourhood-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
