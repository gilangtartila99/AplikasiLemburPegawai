<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $nik
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $nama
 * @property integer $no_ktp
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $no_telp
 *
 * @property Lembur[] $lemburs
 * @property Lembur[] $lemburs0
 * @property Lembur[] $lemburs1
 * @property Lembur[] $lemburs2
 * @property Lembur[] $lemburs3
 */
class Userss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'username', 'password', 'authKey', 'accessToken', 'nama', 'no_ktp', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telp'], 'required'],
            [['nik', 'no_ktp'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['username', 'password', 'tempat_lahir'], 'string', 'max' => 100],
            [['authKey', 'accessToken', 'nama'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 1000],
            [['no_telp'], 'string', 'max' => 20],
            [['nik'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'nama' => 'Nama',
            'no_ktp' => 'No Ktp',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs()
    {
        return $this->hasMany(Lembur::className(), ['nik' => 'nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs0()
    {
        return $this->hasMany(Lembur::className(), ['user1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs1()
    {
        return $this->hasMany(Lembur::className(), ['user2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs2()
    {
        return $this->hasMany(Lembur::className(), ['user3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLemburs3()
    {
        return $this->hasMany(Lembur::className(), ['user4' => 'id']);
    }
}
