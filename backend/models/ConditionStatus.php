<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "condition_status".
 *
 * @property integer $id
 * @property string $condition_name
 *
 * @property PropertyCondition[] $propertyConditions
 * @property Property[] $idProperties
 */
class ConditionStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'condition_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['condition_name'], 'required'],
            [['condition_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'condition_name' => 'Condition Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyConditions()
    {
        return $this->hasMany(PropertyCondition::className(), ['id_condition' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProperties()
    {
        return $this->hasMany(Property::className(), ['id_property' => 'id_property'])->viaTable('property_condition', ['id_condition' => 'id']);
    }
}
