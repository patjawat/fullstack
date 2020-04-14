<?php

namespace app\modules\car2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\car2\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `app\modules\car2\models\Cars`.
 */
class CarsSearch extends Cars
{
    /**
     * {@inheritdoc}
     */
    public $q;
    public function rules()
    {
        return [
            [['id', 'model_id', 'branch_id', 'created_by', 'updated_by'], 'integer'],
            [['ref', 'photo', 'content', 'created_at', 'updated_at','q'], 'safe'],
            [['price', 'sell'], 'number'],
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
        $query = Cars::find();

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
            'model_id' => $this->model_id,
            'price' => $this->price,
            'sell' => $this->sell,
            'branch_id' => $this->branch_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}