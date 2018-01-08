<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Upah;

/**
 * UpahSearch represents the model behind the search form about `app\models\Upah`.
 */
class UpahSearch extends Upah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_upah', 'upah'], 'integer'],
            [['jenis'], 'safe'],
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
        $query = Upah::find();

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
            'id_upah' => $this->id_upah,
            'upah' => $this->upah,
        ]);

        $query->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
