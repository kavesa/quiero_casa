<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_condition".
 *
 * @property integer $id_property
 * @property integer $id_condition
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
}
