<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Positions;

/**
 * PositionsSearchModel represents the model behind the search form of `frontend\models\Positions`.
 */
class PositionsSearchModel extends Positions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['art', 'shtrih', 'name', 'date', 'group', 'podgroup', 'size', 'podrobno', 'add_pole', 'from_id'], 'safe'],
            [['price'], 'number'],
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
        $query = Positions::find();

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
            'price' => $this->price,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'art', $this->art])
            ->andFilterWhere(['like', 'shtrih', $this->shtrih])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'group', $this->group])
            ->andFilterWhere(['like', 'podgroup', $this->podgroup])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'podrobno', $this->podrobno])
            ->andFilterWhere(['like', 'add_pole', $this->add_pole])
            ->andFilterWhere(['like', 'from_id', $this->from_id]);

        return $dataProvider;
    }
}
