<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operation_type".
 *
 * @property integer $id
 * @property string $type
 *
 * @property PropertyPrice[] $propertyPrices
 */
class OperationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyPrices()
    {
        return $this->hasMany(PropertyPrice::className(), ['id_operation' => 'id']);
    }
}
