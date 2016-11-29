<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use mdm\admin\models\form\Signup;
use mdm\admin\models\User;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions() 
    { 
        $actions = parent::actions();
        unset($actions['create']);// = [$this, 'Signup'];
        return $actions;
    }

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['index', 'view', 'delete', 'update'], //solo para la accion indicada
            ],
        ];
    }

    public function afterAction($action, $result)
	{
	    //$result = parent::afterAction($action, $result);
		if($action->id == "index")
        {
            $user = \Yii::$app->user->identity;
            
            $result = array('username' => $user->username,
            				'userid' => $user->id);
    	    
    	    return $result;
        }
	}

    public function actionCreate()
    {
        $model = new Signup();
        $body = Yii::$app->getRequest()->bodyParams;

        if(User::findByUsername($body['username']))
        {
            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            $response->data = ['message' => 'Username already exists'];
            $response->statusCode = 409;
            return $response;
        }

        $model['username'] = $body['username'];
        $model['email'] = $body['email'];
        $model['password'] = $body['password'];
        
        if ($user = $model->signup()) {
            $result = array('username' => $user->username,
                            'userid' => $user->id);
            
            $user = User::findByUsername($body['email']);
        }

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['message' => 'User created'];
        $response->statusCode = 200;
        return $response;

    }
}
