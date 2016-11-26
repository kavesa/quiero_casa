<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id_property
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $address
 * @property string $latitude
 * @property string $longitude
 * @property double $constructed_surface
 * @property double $total_surface
 * @property integer $id_neighborhood
 * @property integer $id_client
 * @property integer $id_property_type
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $laundry
 * @property integer $barbacoa
 * @property integer $garage
 * @property integer $backyard
 * @property integer $frontyard
 * @property integer $swimmingpool
 * @property integer $guesthouse
 *
 * @property Favorite[] $favorites
 * @property User[] $idUsers
 * @property Important[] $importants
 * @property Client $idClient
 * @property Neighbourhood $idNeighborhood
 * @property PropertyType $idPropertyType
 * @property PropertyCondition[] $propertyConditions
 * @property ConditionStatus[] $idConditions
 * @property PropertyImage[] $propertyImages
 * @property PropertyPrice[] $propertyPrices
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
            [['title', 'short_description', 'description', 'address', 'latitude', 'longitude', 'constructed_surface', 'total_surface', 'id_neighborhood', 'id_client', 'id_property_type'], 'required'],
            [['constructed_surface', 'total_surface'], 'number'],
            [['id_neighborhood', 'id_client', 'id_property_type', 'bedrooms', 'bathrooms', 'laundry', 'barbacoa', 'garage', 'backyard', 'frontyard', 'swimmingpool', 'guesthouse'], 'integer'],
            [['title', 'short_description', 'description', 'address'], 'string', 'max' => 255],
            [['latitude', 'longitude'], 'string', 'max' => 20],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_neighborhood'], 'exist', 'skipOnError' => true, 'targetClass' => Neighbourhood::className(), 'targetAttribute' => ['id_neighborhood' => 'id']],
            [['id_property_type'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyType::className(), 'targetAttribute' => ['id_property_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_property' => 'Id Property',
            'title' => 'Title',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'constructed_surface' => 'Constructed Surface',
            'total_surface' => 'Total Surface',
            'id_neighborhood' => 'Id Neighborhood',
            'id_client' => 'Id Client',
            'id_property_type' => 'Id Property Type',
            'bedrooms' => 'Bedrooms',
            'bathrooms' => 'Bathrooms',
            'laundry' => 'Laundry',
            'barbacoa' => 'Barbacoa',
            'garage' => 'Garage',
            'backyard' => 'Backyard',
            'frontyard' => 'Front Yard',
            'swimmingpool' => 'Swimming Pool',
            'guesthouse' => 'Guest House',
        ];
    }

    public function fields()
    {
        return [
            'id_property',
            'title',
            'short_description',
            'description',
            'address',
            'latitude',
            'longitude',
            'constructed_surface',
            'total_surface',
            'neighborhood' => function($model) {
                return $model->idNeighborhood;
            },
            'client' => function($model) {
                return $model->idClient;
            },
            'property_type' => function($model) {
                return $model->idPropertyType;
            },
            'bedrooms',
            'bathrooms',
            'laundry',
            'barbacoa',
            'garage',
            'backyard',
            'frontyard',
            'swimmingpool',
            'guesthouse',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::className(), ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('favorite', ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImportants()
    {
        return $this->hasMany(Important::className(), ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNeighborhood()
    {
        return $this->hasOne(Neighbourhood::className(), ['id' => 'id_neighborhood']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropertyType()
    {
        return $this->hasOne(PropertyType::className(), ['id' => 'id_property_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyConditions()
    {
        return $this->hasMany(PropertyCondition::className(), ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConditions()
    {
        return $this->hasMany(ConditionStatus::className(), ['id' => 'id_condition'])->viaTable('property_condition', ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyImages()
    {
        return $this->hasMany(PropertyImage::className(), ['id_property' => 'id_property']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyPrices()
    {
        return $this->hasMany(PropertyPrice::className(), ['id_property' => 'id_property']);
    }
}
