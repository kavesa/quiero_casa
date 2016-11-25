<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\Property;

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
                'only' => ['index', 'view', 'create', 'delete'], //solo para la accion indicada
            ],
        ];
    }

    public function afterAction($action, $result)
	{
	    $result = parent::afterAction($action, $result);
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

	    //var_dump($result);
	    //die;
	    
	    return $result;
	}
}

?>