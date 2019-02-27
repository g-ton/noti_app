<?php

namespace app\models;

class SuscriptorUsuarioLogin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public function getSuscriptor()
    {
        return $this->hasOne(Suscriptor::className(), ['id' => 'id_suscriptor']);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public static function tableName()
    {
        return 'Suscriptor_Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'estatus' => 1]);
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    #Métodos no utilizados, Yii recomienda dejar el cuerpo vacío en ellos
    public function getAuthKey()
    {
    }
    public function validateAuthKey($authKey)
    {
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
}
