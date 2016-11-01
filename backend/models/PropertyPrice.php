<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_price".
 *
 * @property integer $id_property
 * @property integer $id_operation
 * @property integer $id_currency
 * @property double $price
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
}
