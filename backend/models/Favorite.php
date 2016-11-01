<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property integer $id_user
 * @property integer $id_property
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_property'], 'required'],
            [['id_user', 'id_property'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'id_property' => 'Id Property',
        ];
    }
}
