<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $address
 * @property string $latitude
 * @property string $longitude
 * @property double $constructed_surface
 * @property double $total_surface
 * @property integer $id_state
 * @property integer $id_neighborhood
 * @property integer $id_client
 * @property integer $id_property_type
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'short_description', 'description', 'address', 'latitude', 'longitude', 'constructed_surface', 'total_surface', 'id_state', 'id_neighborhood', 'id_client', 'id_property_type'], 'required'],
            [['constructed_surface', 'total_surface'], 'number'],
            [['id_state', 'id_neighborhood', 'id_client', 'id_property_type'], 'integer'],
            [['title', 'short_description', 'description', 'address'], 'string', 'max' => 255],
            [['latitude', 'longitude'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'constructed_surface' => 'Constructed Surface',
            'total_surface' => 'Total Surface',
            'id_state' => 'Id State',
            'id_neighborhood' => 'Id Neighborhood',
            'id_client' => 'Id Client',
            'id_property_type' => 'Id Property Type',
        ];
    }
}
