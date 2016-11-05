<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Important */

$this->title = 'Update Important: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Importants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="important-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
