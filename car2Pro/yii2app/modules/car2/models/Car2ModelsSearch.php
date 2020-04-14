<?php

namespace app\modules\car2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\car2\models\Car2Models;

/**
 * Car2ModelsSearch represents the model behind the search form of `app\modules\car2\models\Car2Models`.
 */
class Car2ModelsSearch extends Car2Models
{
    /**
     * {@inheritdoc}
     */
    public $q;
    public function rules()
    {
        return [
            [['id', 'band_id'], 'integer'],
            [['name','q'], 'safe'],
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
        $query = Car2Models::find();

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
            'band_id' => $this->band_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}