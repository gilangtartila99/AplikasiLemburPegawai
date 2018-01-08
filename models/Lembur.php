<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lembur".
 *
 * @property string $id_lembur
 * @property int $nik
 * @property string $tanggal
 * @property string $hari
 * @property string $jam_mulai_lembur
 * @property string $jam_akhir_lembur
 * @property int $jumlah_jam_lembur
 * @property int $upah_lembur
 * @property int $total_upah
 * @property string $keterangan
 * @property string $status
 * @property int $user1
 * @property int $user2
 * @property int $user3
 * @property int $user4
 *
 * @property Evaluasi[] $evaluasis
 * @property Upah $upahLembur
 * @property User $nik0
 * @property User $user10
 * @property User $user20
 * @property User $user30
 * @property User $user40
 */
class Lembur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lembur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'tanggal', 'hari', 'jam_mulai_lembur', 'jam_akhir_lembur', 'jumlah_jam_lembur', 'upah_lembur', 'total_upah'], 'required'],
            [['nik', 'jumlah_jam_lembur', 'upah_lembur', 'total_upah', 'user1', 'user2', 'user3', 'user4'], 'integer'],
            [['tanggal', 'jam_mulai_lembur', 'jam_akhir_lembur'], 'safe'],
            [['hari'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 1000],
            [['status'], 'string', 'max' => 100],
            [['upah_lembur'], 'exist', 'skipOnError' => true, 'targetClass' => Upah::className(), 'targetAttribute' => ['upah_lembur' => 'id_upah']],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['nik' => 'nik']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lembur' => 'No Lembur',
            'nik' => 'NIK',
            'tanggal' => 'Tanggal Lembur',
            'hari' => 'Hari Lembur',
            'jam_mulai_lembur' => 'Jam Mulai Lembur',
            'jam_akhir_lembur' => 'Jam Akhir Lembur',
            'jumlah_jam_lembur' => 'Jumlah Jam Lembur',
            'upah_lembur' => 'Upah Lembur',
            'total_upah' => 'Total Upah',
            'keterangan' => 'Uraian Kerja',
            'status' => 'Status',
            'user1' => 'Kepala Seksi/Departemen',
            'user2' => 'Kepala Divisi/Direktur',
            'user3' => 'HRD',
            'user4' => 'HNN/ANI',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluasis()
    {
        return $this->hasMany(Evaluasi::className(), ['id_lembur' => 'id_lembur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpahLembur()
    {
        return $this->hasOne(Upah::className(), ['id_upah' => 'upah_lembur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNiks()
    {
        return $this->hasOne(Users::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser1()
    {
        return $this->hasOne(Users::className(), ['id' => 'user1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2()
    {
        return $this->hasOne(Users::className(), ['id' => 'user2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser3()
    {
        return $this->hasOne(Users::className(), ['id' => 'user3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser4()
    {
        return $this->hasOne(User::className(), ['id' => 'user4']);
    }
}
