<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluasi".
 *
 * @property int $id_evaluasi
 * @property string $id_lembur
 * @property string $hasil_kerja_lembur
 * @property string $evaluasi
 *
 * @property Lembur $lembur
 */
class Evaluasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lembur', 'hasil_kerja_lembur', 'evaluasi'], 'required'],
            [['id_lembur'], 'integer'],
            [['hasil_kerja_lembur', 'evaluasi'], 'string', 'max' => 2000],
            [['id_lembur'], 'exist', 'skipOnError' => true, 'targetClass' => Lembur::className(), 'targetAttribute' => ['id_lembur' => 'id_lembur']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_evaluasi' => 'ID Evaluasi',
            'id_lembur' => 'No Lembur',
            'hasil_kerja_lembur' => 'Hasil Kerja Lembur',
            'evaluasi' => 'Evaluasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs()
    {
        return $this->hasOne(Lembur::className(), ['id_lembur' => 'id_lembur']);
    }
}
