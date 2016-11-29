<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class ClientController extends ActiveController
{
    public $modelClass = 'backend\models\Client';

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['jp'], //solo para la accion jp :P
            ],
        ];
    }

    /**
     * Returns username and email
     */
    public function actionIndex()
    {
        $user = \Yii::$app->user->identity;
        return [
            'username' => $user->username,
            'email' =>  $user->email,
        ];
    }
}
