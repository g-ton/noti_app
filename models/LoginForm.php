<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $correo;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message'=>'El campo {attribute} es requerido.'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['correo', 'validateSuscriptor'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Usuario o Contraseña Incorrectos');
            }
        }
    }

    public function validateSuscriptor($attribute, $params)
    {
        $user = $this->getUser();

        if(isset($user->suscriptor)){
            $suscriptor= $user->suscriptor;
            $fecha_actual= Date('Y-m-d');

            if ($suscriptor->bloqueado === 1) {
                $this->addError($attribute, 'El Suscriptor está Bloqueado (Por cuenta vencida ó Baja temporal de ésta), si piensas que es un error en el sistema favor de contactarnos');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user= SuscriptorUsuarioLogin::find()
            ->joinWith('suscriptor')
            ->where(['Suscriptor.correo'=> $this->correo, 'Suscriptor_Usuario.username'=> $this->username, 'Suscriptor.estatus'=> 1, 'Suscriptor_Usuario.estatus'=> 1])
            ->one();
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'correo' => 'Correo Electrónico',
            'rememberMe' => 'Recordar',
        ];
    }
}
