<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente_Usuario".
 *
 * @property int $id
 * @property int $id_cliente
 * @property string $username
 * @property string $password
 * @property string $ultimo_acceso
 * @property int $estatus 1= Activo, 0= Eliminado 
 */
class ClienteUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente_Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $session = Yii::$app->session;
        $id_cliente = $session->get('id_cliente');
        
        return [
            ['username', 'unique', 'filter' => ['id_cliente'=> $id_cliente, 'estatus'=> 1]],
            [['id_cliente', 'username', 'password'], 'required'],
            [['id_cliente', 'estatus'], 'integer'],
            [['ultimo_acceso'], 'safe'],
            [['username', 'password'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente' => 'Id Cliente',
            'username' => 'Username',
            'password' => 'Password',
            'ultimo_acceso' => 'Ultimo Acceso',
            'estatus' => 'Estatus',
        ];
    }
}
