<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evaluasi;

/**
 * EvaluasiSearch represents the model behind the search form of `app\models\Evaluasi`.
 */
class EvaluasiSearch extends Evaluasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evaluasi', 'id_lembur'], 'integer'],
            [['hasil_kerja_lembur', 'evaluasi'], 'safe'],
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
        $query = Evaluasi::find();

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
            'id_evaluasi' => $this->id_evaluasi,
            'id_lembur' => $this->id_lembur,
        ]);

        $query->andFilterWhere(['like', 'hasil_kerja_lembur', $this->hasil_kerja_lembur])
            ->andFilterWhere(['like', 'evaluasi', $this->evaluasi]);

        return $dataProvider;
    }
}
