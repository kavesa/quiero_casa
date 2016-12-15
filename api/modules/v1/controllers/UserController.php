<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use mdm\admin\models\form\Signup;
use mdm\admin\models\User;
use api\common\components\Mailer;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions() 
    { 
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['index']);
        return $actions;
    }

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['view', 'delete', 'update'], //solo para la accion indicada
            ],
        ];
    }

    public function afterAction($action, $result)
	{
	    //$result = parent::afterAction($action, $result);
		/*if($action->id == "index")
        {
            $user = \Yii::$app->user->identity;
            
            $result = array('username' => $user->username,
            				'userid' => $user->id);
    	    
    	    return $result;
        }*/
	}

    public function actionCreate()
    {
        $model = new Signup();
        $body = Yii::$app->getRequest()->bodyParams;

        if($uu = User::findByUsername($body['username']))
        {
            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            $response->data = ['message' => 'Username already exists'];
            $response->statusCode = 409;
            return $response;
        }

        $model['username'] = $body['username'];
        $model['email'] = $body['username'];
        $model['password'] = $body['password'];
        
        if ($user = $model->signup()) {
            $result = array('username' => $user->username,
                            'userid' => $user->id);
            $user = User::findByUsername($body['username']);
        }

        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['message' => 'User created. Confirmation pending.'];
        $response->statusCode = 200;
        return $response;
    }

    public function actionIndex()
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        
        if(isset(Yii::$app->getRequest()->getQueryParams()['secret']))
        {
            $secret = Yii::$app->getRequest()->getQueryParams()['secret'];
            $user = User::findByAuthKey($secret);

            if($user)
            {
                $user->status = 10;
                $user->save();

                $response->data = ['message' => 'User confirmed.'];
                $response->statusCode = 200;
                $response->redirect('http://localhost/QuieroCasa_FO/verify.html');
            }
            else
            {
                $response->data = ['message' => 'Provided secret not suitable for a teapot.'];
                $response->statusCode = 418;
            }

        }
        else
        {
            $response->data = ['message' => 'Bad request. Missing secret for user activation.'];
            $response->statusCode = 400;
        }

        return $response;
    }
}
