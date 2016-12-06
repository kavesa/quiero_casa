<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_price".
 *
 * @property integer $id_property
 * @property integer $id_operation
 * @property integer $id_currency
 * @property double $price
 *
 * @property Currency $idCurrency
 * @property OperationType $idOperation
 * @property Property $idProperty
 */
class PropertyPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'id_operation', 'id_currency', 'price'], 'required'],
            [['id_property', 'id_operation', 'id_currency'], 'integer'],
            [['price'], 'number'],
            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['id_currency' => 'id']],
            [['id_operation'], 'exist', 'skipOnError' => true, 'targetClass' => OperationType::className(), 'targetAttribute' => ['id_operation' => 'id']],
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
            'id_operation' => 'Id Operation',
            'id_currency' => 'Id Currency',
            'price' => 'Price',
        ];
    }

    public function fields()
    {
        return [
            'id_property',
            'operation' => function($model) {
                return $model->idOperation->type;
            },
            'currency' => function($model) {
                return $model->idCurrency->name;
            },
            'price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'id_currency']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOperation()
    {
        return $this->hasOne(OperationType::className(), ['id' => 'id_operation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProperty()
    {
        return $this->hasOne(Property::className(), ['id_property' => 'id_property']);
    }
}
