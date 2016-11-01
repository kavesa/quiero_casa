<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property_image".
 *
 * @property integer $id_property
 * @property string $image
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
}
