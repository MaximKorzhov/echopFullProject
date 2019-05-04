<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PositionSearchModel represents the model behind the search form of `frontend\models\Position`.
 */
class PositionSearchModel extends Position
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'org_id', 'sales_tax'], 'integer'],
            [['art', 'shtrih', 'name', 'date', 'group', 'podgroup', 'size', 'podrobno', 'add_pole', 'sales_tax'], 'safe'],
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
        $query = Position::find();

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
            'org_id' => $this->org_id,
            'sales_tax' => $this->sales_tax,
        ]);

        $query->andFilterWhere(['like', 'art', $this->art])
            ->andFilterWhere(['like', 'shtrih', $this->shtrih])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'group', $this->group])
            ->andFilterWhere(['like', 'podgroup', $this->podgroup])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'podrobno', $this->podrobno])
            ->andFilterWhere(['like', 'add_pole', $this->add_pole])
            ->andFilterWhere(['like', 'add_pole', $this->sales_tax]);

        return $dataProvider;
    }
}
