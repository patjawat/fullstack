<?php

namespace app\modules\car2\models;

use app\modules\car2\models\Customers;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CustomersSearch represents the model behind the search form of `app\modules\car2\models\Customers`.
 */
class CustomersSearch extends Customers
{
    public $q;
    public function rules()
    {
        return [
            [['id', 'gender', 'pname', 'fullname', 'birthdate', 'cid', 'address', 'created_at', 'updated_at', 'q'], 'safe'],
            [['branch_id', 'created_by', 'updated_by'], 'integer'],
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
        $query = Customers::find();

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
            'birthdate' => $this->birthdate,
            'branch_id' => $this->branch_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}