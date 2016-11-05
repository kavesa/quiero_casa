<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\ImportantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Importants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="important-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Important', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_property',
            'start_date',
            'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
