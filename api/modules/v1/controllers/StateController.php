<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\StateSearch;

class StateController extends ActiveController
{
    public $modelClass = 'backend\models\State';

	public function actions() 
    { 
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() 
    {
        $searchModel = new StateSearch();    
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['create', 'update', 'delete'],
            ],
        ];
    }

}