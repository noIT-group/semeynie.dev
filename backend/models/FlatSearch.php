<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Flat;

/**
 * FlatSearch represents the model behind the search form of `backend\models\Flat`.
 */
class FlatSearch extends Flat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'room_quantity', 'wind_rose', 'floor_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['flat_img', 'coordinate'], 'safe'],
            [['square_size'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Flat::find();

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
            'id' => $this->id,
            'square_size' => $this->square_size,
            'room_quantity' => $this->room_quantity,
            'wind_rose' => $this->wind_rose,
            'floor_id' => $this->floor_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'flat_img', $this->flat_img])
            ->andFilterWhere(['like', 'coordinate', $this->coordinate]);

        return $dataProvider;
    }
}
