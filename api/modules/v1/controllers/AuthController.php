<?php

namespace api\modules\v1\controllers;
 
use common\models\LoginForm;
 
class AuthController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            /** 
             * checks oauth2 credentions
             * and performs OAuth2 authorization, if user is logged on
             */
            'oauth2Auth' => [
                'class' => \conquer\oauth2\AuthorizeFilter::className(),
                'only' => ['index'],
            ],
        ];
    }
    public function actions()
    {
        return [
            // returns access token
            'token' => [
                'class' => \conquer\oauth2\TokenAction::classname(),
            ],
        ];
    }
    /**
     * Display login form to authorize user
     */
    public function actionIndex()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}

?>