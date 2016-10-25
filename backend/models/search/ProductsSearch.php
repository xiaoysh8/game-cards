<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `common\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'providers_id'], 'integer'],
            [['serial_no', 'title', 'bar_code', 'appear_time'], 'safe'],
            [['retail_price', 'wholesale'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Products::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'retail_price' => $this->retail_price,
            'wholesale' => $this->wholesale,
            'providers_id' => $this->providers_id,
        ]);

        $query->andFilterWhere(['like', 'serial_no', $this->serial_no])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'bar_code', $this->bar_code])
            ->andFilterWhere(['like', 'appear_time', $this->appear_time]);

        return $dataProvider;
    }
}
