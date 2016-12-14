<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClientType */

$this->title = 'Crear Tipos de Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Cliente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
