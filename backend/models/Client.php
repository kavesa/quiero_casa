<?php

namespace app\models;

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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client_type' => 'Id Client Type',
            'name' => 'Name',
            'priority' => 'Priority',
            'phone' => 'Phone',
            'email' => 'Email',
            'availability' => 'Availability',
            'is_business' => 'Is Business',
        ];
    }
}
