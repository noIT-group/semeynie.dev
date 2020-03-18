<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ConstructionProgress;

/**
 * ConstructionProgressSearch represents the model behind the search form of `backend\models\ConstructionProgress`.
 */
class ConstructionProgressSearch extends ConstructionProgress
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'date', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name_short_ru', 'name_full_ru', 'body_ru', 'videos'], 'safe'],
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
        $query = ConstructionProgress::find();

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
            'date' => $this->date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name_short_ru', $this->name_short_ru])
            ->andFilterWhere(['like', 'name_full_ru', $this->name_full_ru])
            ->andFilterWhere(['like', 'body_ru', $this->body_ru])
            ->andFilterWhere(['like', 'videos', $this->videos]);

        return $dataProvider;
    }
}
