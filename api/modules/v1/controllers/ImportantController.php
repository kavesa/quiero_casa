<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\Property;
use backend\models\Important;

class ImportantController extends ActiveController
{
    public $modelClass = 'backend\models\Important';

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['create', 'delete', 'view', 'update'],
            ],
        ];
    }

    public function actions() 
    { 
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $result = Important::find()
            ->where(['and', 'start_date <= now()', 'end_date > now()'])
            ->all();

        return $result;
    }

}
