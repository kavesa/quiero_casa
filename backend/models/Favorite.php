<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property integer $id_user
 * @property integer $id_property
 *
 * @property Property $idProperty
 * @property User $idUser
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
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['id_property' => 'id_property']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    public static function primaryKey(){
        return array('id_user', 'id_property');
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProperty()
    {
        return $this->hasOne(Property::className(), ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
