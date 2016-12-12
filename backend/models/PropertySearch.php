<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Property;

/**
 * PropertySearch represents the model behind the search form about `backend\models\Property`.
 */
class PropertySearch extends Property
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'id_neighborhood', 'id_client', 'id_property_type'], 'integer'],
            [['title', 'short_description', 'description', 'address', 'latitude', 'longitude'], 'safe'],
            [['constructed_surface', 'total_surface'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Property::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_property' => $this->id_property,
            'id_neighborhood' => $this->id_neighborhood,
            'id_client' => $this->id_client,
            'id_property_type' => $this->id_property_type,
        ]);

        if(isset($params['bathrooms'])) $query->andFilterWhere(['=', 'bathrooms', $params['bathrooms']]);
        if(isset($params['bedrooms'])) 
        {
            if($params['bedrooms'] == '999')
            {
                $query->andFilterWhere(['>', 'bedrooms', 4]);
            }
            else
            {
                $query->andFilterWhere(['=', 'bedrooms', $params['bedrooms']]);
            }
        } 
        if(isset($params['laundry'])) $query->andFilterWhere(['=', 'laundry', $params['laundry']]);
        if(isset($params['barbacoa'])) $query->andFilterWhere(['=', 'barbacoa', $params['barbacoa']]);
        if(isset($params['garage'])) $query->andFilterWhere(['=', 'garage', $params['garage']]);
        if(isset($params['backyard'])) $query->andFilterWhere(['=', 'backyard', $params['backyard']]);
        if(isset($params['frontyard'])) $query->andFilterWhere(['=', 'frontyard', $params['frontyard']]);
        if(isset($params['swimmingpool'])) $query->andFilterWhere(['=', 'swimmingpool', $params['swimmingpool']]);
        if(isset($params['guesthouse'])) $query->andFilterWhere(['=', 'guesthouse', $params['guesthouse']]);
        if(isset($params['id_client_type'])) $query->joinWith(['idClient'])->where(['=', 'id_client_type', $params['id_client_type']]);
        if(isset($params['id_condition'])) $query->joinWith(['idConditions'])->where(['=', 'id_condition', $params['id_condition']]);
        if(isset($params['id_operation_type'])) $query->joinWith(['propertyPrices'])->where(['=', 'id_operation', $params['id_operation_type']]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        //Búsqueda por near location
        if(isset($params['location']))
        {
            $location = explode(';', $params['location']);
            $lat = $location[0];
            $lng = $location[1];
            $distance = isset($params['distance'])? $params['distance'] : 1; //si no recibo distance, lo seteo en 1km

            //var_dump($lat.' '.$lng.' '.$distance);die;
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand('
            SELECT id_property, title, latitude, longitude, (6371 * acos(cos(radians('.$lat.')) * cos(radians( latitude ) ) 
                        * cos( radians( longitude ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin(radians(latitude)) ) ) AS distance 
                        FROM property 
                        HAVING distance < '.$distance.' 
                        ORDER BY distance 
                        LIMIT 0 , 20;');
            $result = $command->queryAll();

            return $result;

            //var_dump($result);die;
        }

        //búsqueda por total surface range
        if(isset($params['total_surface_range']))
        {
            $range = explode(';', $params['total_surface_range']);
            $min_surface = $range[0];
            $max_surface = $range[1];

            $query->andFilterWhere(['>=', 'total_surface', $min_surface]);
            $query->andFilterWhere(['<=', 'total_surface', $max_surface]);
        }
        else
        {
            $query->andFilterWhere(['total_surface' => $this->total_surface]);
        }

        //búsqueda por constructed surface range
        if(isset($params['constructed_surface_range']))
        {
            $range = explode(';', $params['constructed_surface_range']);
            $min_surface = $range[0];
            $max_surface = $range[1];

            $query->andFilterWhere(['>=', 'constructed_surface', $min_surface]);
            $query->andFilterWhere(['<=', 'constructed_surface', $max_surface]);
        }
        else
        {
            $query->andFilterWhere(['constructed_surface' => $this->constructed_surface]);
        }

        //búsqueda por price range
        //se debe llamar usando también el queryparam 'id_operation_type'
        if(isset($params['price_range']))
        {
            $range = explode(';', $params['price_range']);
            $price_from = $range[0];
            $price_to = $range[1];
            $query->joinWith(['propertyPrices'])->where(['>=', 'price', $price_from]);
            $query->joinWith(['propertyPrices'])->where(['<=', 'price', $price_to]);
            $query->joinWith(['propertyPrices'])->where(['=', 'id_currency', $params['id_currency']]);
            $query->joinWith(['propertyPrices'])->where(['=', 'id_operation', $params['id_operation_type']]);
        }


        if(isset($params['limit']))
        {
            $query->limit($params['limit']);
        }

        if(isset($params['offset']))
        {
            $query->offset($params['offset']);
        }

        return $dataProvider;
    }
}
