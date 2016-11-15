<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Neighbourhood */

$this->title = 'Crear Barrio';
$this->params['breadcrumbs'][] = ['label' => 'Barrios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="neighbourhood-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
