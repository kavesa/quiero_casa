<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_condition".
 *
 * @property integer $id_property
 * @property integer $id_condition
 *
 * @property ConditionStatus $idCondition
 * @property Property $idProperty
 */
class PropertyCondition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_condition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'id_condition'], 'required'],
            [['id_property', 'id_condition'], 'integer'],
            [['id_condition'], 'exist', 'skipOnError' => true, 'targetClass' => ConditionStatus::className(), 'targetAttribute' => ['id_condition' => 'id']],
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['id_property' => 'id_property']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_property' => 'Id Property',
            'id_condition' => 'Id Condition',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCondition()
    {
        return $this->hasOne(ConditionStatus::className(), ['id' => 'id_condition']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProperty()
    {
        return $this->hasOne(Property::className(), ['id_property' => 'id_property']);
    }
}
