<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Shops;

/**
 * ShopsSearchModel represents the model behind the search form of `frontend\models\Shops`.
 */
class ShopsSearchModel extends Shops
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['unp', 'bank', 'contact_id', 'name', 'schet', 'balans', 'status'], 'safe'],
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
        $query = Shops::find();

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
        ]);

        $query->andFilterWhere(['like', 'unp', $this->unp])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'contact_id', $this->contact_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'schet', $this->schet])
            ->andFilterWhere(['like', 'balans', $this->balans])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
