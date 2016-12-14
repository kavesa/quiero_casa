<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property integer $id_client_type
 * @property string $name
 * @property integer $priority
 * @property string $phone
 * @property string $email
 * @property string $availability
 * @property integer $is_business
 *
 * @property ClientType $idClientType
 * @property Property[] $properties
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client_type', 'name', 'priority', 'phone', 'email', 'availability', 'is_business'], 'required'],
            [['id_client_type', 'priority', 'is_business'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['availability'], 'string', 'max' => 200],
            [['id_client_type'], 'exist', 'skipOnError' => true, 'targetClass' => ClientType::className(), 'targetAttribute' => ['id_client_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client_type' => 'Tipo de cliente',
            'name' => 'Nombre',
            'priority' => 'Prioridad',
            'phone' => 'Teléfono',
            'email' => 'Email',
            'availability' => 'Disponibilidad',
            'is_business' => 'Es inmobiliaria',
        ];
    }

    public function fields()
    {
        return[
            'id',
            'id_client_type' => function($model) {
                return $model->idClientType;
            },
            'name',
            'priority',
            'phone',
            'email',
            'availability',
            'is_business',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClientType()
    {
        return $this->hasOne(ClientType::className(), ['id' => 'id_client_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Property::className(), ['id_client' => 'id']);
    }
}
