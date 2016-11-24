<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Favorite */

$this->title = 'Update Favorite: ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_property' => $model->id_property]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favorite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
