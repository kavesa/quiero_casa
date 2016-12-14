<?php

namespace backend\models;

use Yii;

use yii\helpers\Url;

use yii\web\UploadedFile;

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

    public $image;
    public $filename;
    public $avatar;
    public $currency;
    public $operationType;
    public $price;

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
            [['title', 'short_description', 'description', 'address', 'latitude', 'longitude', 'constructed_surface', 'total_surface', 'id_neighborhood', 'id_client', 'id_property_type', 'bedrooms', 'bathrooms'], 'required'],
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
            'id_condition' => 'Condicion',
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
            'prices' => function($model) {
                return $model->propertyPrices;
            },
            /*'condition_status' => function($model) {
                return $model->idConditions;
            },*/
            'property_condition' => function($model) {
                return $model->idConditions;
            },
            /*'id_currency',*/
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {

            $this->bedrooms = (!$this->bedrooms?0:$this->bedrooms);
            $this->bathrooms = (!$this->bathrooms?0:$this->bathrooms);
            $this->laundry = (!$this->laundry?0:$this->laundry);
            $this->barbacoa = (!$this->barbacoa?0:$this->barbacoa);
            $this->garage = (!$this->garage?0:$this->garage);
            $this->backyard = (!$this->backyard?0:$this->backyard);
            $this->frontyard = (!$this->frontyard?0:$this->frontyard);
            $this->swimmingpool = (!$this->swimmingpool?0:$this->swimmingpool);
            $this->guesthouse = (!$this->guesthouse?0:$this->guesthouse);

            return true;
        } else {
            return false;
        }
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


    /*public function getIdPrices()
    {
        return $this->hasMany(PropertyPrice::className(), ['id' => 'id_condition'])->viaTable('property_condition', ['id_property' => 'id_property']);
    }*/


    public function getPropertyPricesString($id)
    {
        return Url::base(true) . '?r=property-price&PropertyPriceSearch[id_property]='.$id;
    }

    public function getPropertyConditionsString($id) 
    {
        return Url::base(true) . '?r=property-condition&PropertyConditionSearch[id_property]='.$id;
    }

    public function getPropertyImagesString($id) 
    {
        return Url::base(true) . '?r=property-image&PropertyImageSearch[id_property]='.$id;
    }
}
