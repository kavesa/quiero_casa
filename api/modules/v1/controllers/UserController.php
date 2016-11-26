<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['index', 'view', 'create', 'delete', 'update'], //solo para la accion indicada
            ],
        ];
    }

    public function afterAction($action, $result)
	{
	    //$result = parent::afterAction($action, $result);
		$user = \Yii::$app->user->identity;
        
        $result = array('username' => $user->username,
        				'userid' => $user->id);
	    
	    return $result;
	}
}
