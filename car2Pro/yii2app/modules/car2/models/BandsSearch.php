<?php

namespace app\modules\car2\models;

use app\modules\car2\models\Bands;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BandsSearch represents the model behind the search form of `app\modules\car2\models\Bands`.
 */
class BandsSearch extends Bands
{
    public $q;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'q'], 'safe'],
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
        $query = Bands::find();

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

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}