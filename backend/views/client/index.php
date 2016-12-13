<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use backend\models\ClientType;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'id_client_type'
            ,'value'=>function($model){return $model->idClientType->name;}
            ,'filter'=>ArrayHelper::map(ClientType::find()->orderBy('name')->asArray()->all(), 'id', 'name'),],
            'name',
            'priority',
            'phone',
            // 'email:email',
            // 'availability',
            // 'is_business:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
