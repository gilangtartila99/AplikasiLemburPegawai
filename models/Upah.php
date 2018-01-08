<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "upah".
 *
 * @property integer $id_upah
 * @property string $jenis
 * @property integer $upah
 *
 * @property Lembur[] $lemburs
 * @property Lembur[] $lemburs0
 */
class Upah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis', 'upah'], 'required'],
            [['upah'], 'integer'],
            [['jenis'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_upah' => 'ID Upah',
            'jenis' => 'Jenis',
            'upah' => 'Upah Lembur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs()
    {
        return $this->hasMany(Lembur::className(), ['upah_lembur' => 'id_upah']);
    }
}
