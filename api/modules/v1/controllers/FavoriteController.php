<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use backend\models\Property;
use backend\models\FavoriteSearch;
use backend\models\Favorite;

class FavoriteController extends ActiveController
{
    public $modelClass = 'backend\models\Favorite';

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['index', 'create', 'delete', 'view', 'update'], //solo para la accion indicada
            ],
        ];
    }

    public function actions() 
    { 
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        unset($actions['delete']);
        unset($actions['view']);
        unset($actions['create']);
        return $actions;
    }

    //public function beforeAction()

    public function prepareDataProvider() 
    {
        $searchModel = new FavoriteSearch();    
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    protected function verbs(){
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'delete' => ['DELETE'],
            'view' => ['GET'],
            'index'=>['GET'],
        ];
    }

    public function actionView($id)
    {
        $ids = explode(",", $id);
        $id_user = $ids[0];
        $id_property = $ids[1];
        $model = Favorite::findOne($id_user, $id_property);

        return $model->attributes;
    }

    public function actionDelete($id)
    {
        $ids = explode(",", $id);
        $id_user = $ids[0];
        $id_property = $ids[1];
        Favorite::findOne($id_user, $id_property)->delete();
    }

    public function actionCreate()
    {
        $model = new Favorite();
        $user = \Yii::$app->user->identity;

        $model->id_user = $user->id;
        $model->id_property = Yii::$app->request->post()["id_property"];

        //Yii::$app->request->post()['id_user'] = $user->id;
        //var_dump($model);die;

        if (/*$model->load(Yii::$app->request->post()) &&*/ $model->save()) {
            return $model->attributes;
        } else {
            return $model->getErrors();
            //]);
        }
    }

    public function afterAction($action, $result)
	{
	    $result = parent::afterAction($action, $result);
		
        if($action->id == 'index') {
            $user = \Yii::$app->user->identity;
            
            foreach ($result as $key => $value) {
            	if($result[$key]["id_user"] != $user->id) {
            		unset($result[$key]);
            	}
            }

            foreach ($result as $key => $value) {
            	$model = Property::findOne($result[$key]["id_property"]);
            	$result[$key]["property"] = $model;
            }
        }
	    
	    return $result;
	}
}
