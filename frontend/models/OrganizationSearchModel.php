<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrganizationSearchModel represents the model behind the search form of `frontend\models\Organization`.
 */
class OrganizationSearchModel extends Organization
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'org_type_id'], 'integer'],
            [['unp', 'bank', 'name', 'schet', 'balans', 'status'], 'safe'],
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
        $query = Organization::find();

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
            'user_id' => $this->user_id,
            'org_type_id' => $this->org_type_id,
        ]);

        $query->andFilterWhere(['like', 'unp', $this->unp])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'schet', $this->schet])
            ->andFilterWhere(['like', 'balans', $this->balans])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
