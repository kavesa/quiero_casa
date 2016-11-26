<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "neighbourhood".
 *
 * @property integer $id
 * @property integer $id_state
 * @property string $name
 *
 * @property State $idState
 * @property Property[] $properties
 */
class Neighbourhood extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'neighbourhood';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_state', 'name'], 'required'],
            [['id_state'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['id_state'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['id_state' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_state' => 'Id State',
            'name' => 'Name',
        ];
    }

     public function fields()
    {
        return[
            'id',
            'id_state' => function($model) {
                return $model->idState;
            },
            'name'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdState()
    {
        return $this->hasOne(State::className(), ['id' => 'id_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['id_neighborhood' => 'id']);
    }
}
