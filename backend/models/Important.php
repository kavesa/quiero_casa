<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "important".
 *
 * @property integer $id_property
 * @property string $start_date
 * @property string $end_date
 */
class Important extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'important';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'start_date', 'end_date'], 'required'],
            [['id_property'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_property' => 'Id Property',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
}
