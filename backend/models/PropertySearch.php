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
            'constructed_surface' => $this->constructed_surface,
            'total_surface' => $this->total_surface,
            'id_neighborhood' => $this->id_neighborhood,
            'id_client' => $this->id_client,
            'id_property_type' => $this->id_property_type,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

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
