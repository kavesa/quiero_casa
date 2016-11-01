<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "condition_status".
 *
 * @property integer $id
 * @property string $condition_name
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
}
