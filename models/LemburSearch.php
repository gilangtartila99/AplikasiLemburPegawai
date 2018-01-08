<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lembur;

/**
 * LemburSearch represents the model behind the search form of `app\models\Lembur`.
 */
class LemburSearch extends Lembur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lembur', 'nik', 'jumlah_jam_lembur', 'upah_lembur', 'total_upah', 'user1', 'user2', 'user3', 'user4'], 'integer'],
            [['tanggal', 'hari', 'jam_mulai_lembur', 'jam_akhir_lembur', 'keterangan', 'status'], 'safe'],
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
        $query = Lembur::find();

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
            'id_lembur' => $this->id_lembur,
            'nik' => $this->nik,
            'tanggal' => $this->tanggal,
            'jam_mulai_lembur' => $this->jam_mulai_lembur,
            'jam_akhir_lembur' => $this->jam_akhir_lembur,
            'jumlah_jam_lembur' => $this->jumlah_jam_lembur,
            'upah_lembur' => $this->upah_lembur,
            'total_upah' => $this->total_upah,
            'user1' => $this->user1,
            'user2' => $this->user2,
            'user3' => $this->user3,
            'user4' => $this->user4,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
