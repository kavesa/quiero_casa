<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Important */

$this->title = 'Crear Destacado';
$this->params['breadcrumbs'][] = ['label' => 'Destacados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
