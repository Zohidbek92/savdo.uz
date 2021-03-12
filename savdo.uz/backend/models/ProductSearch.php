<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form of `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoriya_id', 'reyting'], 'integer'],
            [['nomi_uz', 'nomi_uzc', 'nomi_en', 'nomi_ru', 'narxi'], 'safe'],
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
        $query = Product::find();

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
            'categoriya_id' => $this->categoriya_id,
            'reyting' => $this->reyting,
        ]);

        $query->andFilterWhere(['like', 'nomi_uz', $this->nomi_uz])
            ->andFilterWhere(['like', 'nomi_uzc', $this->nomi_uzc])
            ->andFilterWhere(['like', 'nomi_en', $this->nomi_en])
            ->andFilterWhere(['like', 'nomi_ru', $this->nomi_ru])
            ->andFilterWhere(['like', 'narxi', $this->narxi]);

        return $dataProvider;
    }
}
