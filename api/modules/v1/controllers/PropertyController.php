<?php

namespace api\modules\v1\controllers;

use Yii;
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
                'only' => ['create', 'update', 'delete'], 
            ],
        ];
    }

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        //var_dump($result);die;
        if(Yii::$app->getRequest()->getQueryParam('location') != null)
        {
            foreach ($result as $key => $value) {
                $model = Property::findOne($result[$key]["id_property"]);
                //$dist = $result[$key]["distance"];
                $result[$key] = $model;

                //$result[$key]["distance"] = $dist;
            }
        }
        return $result;
    }

}
