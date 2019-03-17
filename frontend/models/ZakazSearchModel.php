<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FpZakaz;

/**
 * FpZakazSearchModel represents the model behind the search form of `frontend\models\FpZakaz`.
 */
class ZakazSearchModel extends Zakaz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zakaz_id', 'zakaz_from', 'zakaz_to', 'position_id', 'zak_id'], 'integer'],
            [['date_from', 'date_to', 'state', 'soob_id', 'summ'], 'safe'],
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
        $query = Zakaz::find();

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
            'zakaz_id' => $this->zakaz_id,
            'zakaz_from' => $this->zakaz_from,
            'zakaz_to' => $this->zakaz_to,
            'position_id' => $this->position_id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'zak_id' => $this->zak_id,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'soob_id', $this->soob_id])
            ->andFilterWhere(['like', 'summ', $this->summ]);

        return $dataProvider;
    }
}
