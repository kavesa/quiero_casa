<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "important".
 *
 * @property integer $id
 * @property integer $id_property
 * @property string $start_date
 * @property string $end_date
 *
 * @property Property $idProperty
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
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['id_property' => 'id_property']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_property' => 'Id Property',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'property' => function($model) {
                return $model->idProperty;
            },
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProperty()
    {
        return $this->hasOne(Property::className(), ['id_property' => 'id_property']);
    }
}
