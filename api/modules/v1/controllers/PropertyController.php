<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\Property;

class PropertyController extends ActiveController
{
    public $modelClass = 'backend\models\Property';

    public function behaviors()
    {
        return [
            // 
            //  Performs authorization by token
            'tokenAuth' => [
                'class' => \conquer\oauth2\TokenAuth::className(),
                'only' => ['view'], //solo para la accion jp :P
            ],
        ];
    }

    //Para modificar el array que se devuelve, agregando los atributos foraneos de forma textual
    public function afterAction($action, $result)
	{
	    $result = parent::afterAction($action, $result);
	    
	    if($result)
	    {
	    	foreach ($result as $key => $value) {
	    		$model = Property::findOne($result[$key]["id_property"]);
	    		$result[$key]["neighborhood"] = $model->idNeighborhood->name;
	    		$result[$key]["client"] = $model->idClient->name;
	    		$result[$key]["property_type"] = $model->idPropertyType->description;
	    	}
	    }
	    
	    return $result;
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

?>