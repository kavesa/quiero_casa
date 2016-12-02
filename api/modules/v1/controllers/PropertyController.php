<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\Property;
use backend\models\PropertySearch;

class PropertyController extends ActiveController
{
    public $modelClass = 'backend\models\Property';

    public function actions() 
    { 
        $actions = parent::actions();
        //unset($actions['index']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() 
    {
        $searchModel = new PropertySearch();    
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

    /*public function actionIndex()
    {
        $result = Property::find()
            ->limit()
            ->all();

        return $result;
    }*/

}
