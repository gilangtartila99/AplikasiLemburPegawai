<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord// implements yii\web\IdentityInterface
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
            [['nik', 'username', 'password', 'authKey', 'accessToken', 'nama', 'no_ktp', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telp', 'jabatan','departemen'], 'required'],
            [['nik', 'no_ktp', 'role'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['username', 'password', 'tempat_lahir'], 'string', 'max' => 100],
            [['authKey', 'accessToken', 'nama'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 1000],
            [['no_telp'], 'string', 'max' => 20],
            [['nik'], 'unique', 'targetClass' => '\app\models\Users', 'message' => 'NIK ini tidak terdaftar.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'NIK',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'nama' => 'Nama',
            'no_ktp' => 'No KTP',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'jabatan' => 'Jabatan',
            'departemen' => 'Departemen',
            'role' => 'Hak Akses',
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

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = Users::findOne($id); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
        return Users::findOne(['authKey' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Users::find()->where(['username'=>$username])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
