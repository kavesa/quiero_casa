<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\NeighbourhoodSearch;

class NeighbourhoodController extends ActiveController
{
    public $modelClass = 'backend\models\Neighbourhood';

	public function actions() 
    { 
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() 
    {
        $searchModel = new NeighbourhoodSearch();    
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['create', 'update', 'delete'], //solo para la accion jp :P
            ],
        ];
    }

    /**
     * Returns username and email
     */
    /*public function actionIndex()
    {
        $user = \Yii::$app->user->identity;
        return [
            'username' => $user->username,
            'email' =>  $user->email,
        ];
    }*/
}
