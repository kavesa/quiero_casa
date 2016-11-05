<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_property',
            'title',
            'short_description',
            'description',
            'address',
            // 'latitude',
            // 'longitude',
            // 'constructed_surface',
            // 'total_surface',
            // 'id_neighborhood',
            // 'id_client',
            // 'id_property_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
