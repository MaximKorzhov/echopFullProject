<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Fpgroup;

/**
 * FpgroupSearchModel represents the model behind the search form of `frontend\models\Fpgroup`.
 */
class FpgroupSearchModel extends Fpgroup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gr_id', 'gr_pod'], 'integer'],
            [['gr_name'], 'safe'],
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
        $query = Fpgroup::find();

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
            'gr_id' => $this->gr_id,
            'gr_pod' => $this->gr_pod,
        ]);

        $query->andFilterWhere(['like', 'gr_name', $this->gr_name]);

        return $dataProvider;
    }
}
