<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_image".
 *
 * @property integer $id_property
 * @property string $image
 *
 * @property Property $idProperty
 */
class PropertyImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'image'], 'required'],
            [['id_property'], 'integer'],
            [['image'], 'string', 'max' => 200],
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
            'image' => 'Image',
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
