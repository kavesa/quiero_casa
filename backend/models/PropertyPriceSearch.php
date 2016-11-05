<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PropertyPrice;

/**
 * PropertyPriceSearch represents the model behind the search form about `backend\models\PropertyPrice`.
 */
class PropertyPriceSearch extends PropertyPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_property', 'id_operation', 'id_currency'], 'integer'],
            [['price'], 'number'],
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
        $query = PropertyPrice::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_property' => $this->id_property,
            'id_operation' => $this->id_operation,
            'id_currency' => $this->id_currency,
            'price' => $this->price,
        ]);

        return $dataProvider;
    }
}
