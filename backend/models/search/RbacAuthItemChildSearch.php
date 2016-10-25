<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RbacAuthItemChild;

/**
 * RbacAuthItemChildSearch represents the model behind the search form about `common\models\RbacAuthItemChild`.
 */
class RbacAuthItemChildSearch extends RbacAuthItemChild
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'safe'],
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
        $query = RbacAuthItemChild::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'parent', $this->parent])
            ->andFilterWhere(['like', 'child', $this->child]);

        return $dataProvider;
    }
}