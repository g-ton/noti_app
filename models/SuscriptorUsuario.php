<?php

namespace app\models;

use Yii;
use app\utilidades\UtilidadesExpReg;

/**
 * This is the model class for table "Suscriptor_Usuario".
 *
 * @property int $id
 * @property int $id_suscriptor
 * @property string $username
 * @property string $password
 * @property string $ultimo_acceso
 * @property int $estatus 1= Activo, 0= Eliminado 
 */
class SuscriptorUsuario extends \yii\db\ActiveRecord
{
    public $rol;
    public $password_repeat;
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function getRolAsignado()
    {
       return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }

    public function getItem_name()
    {
        return $this->rolAsignado->item_name;

    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['id_suscriptor', 'username', 'password', 'rol', 'password_repeat'];
        $scenarios[self::SCENARIO_UPDATE] = ['username', 'rol'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Suscriptor_Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $session = Yii::$app->session;
        $id_suscriptor = $session->get('id_suscriptor');
        
        return [
            ['username', 'unique', 'filter' => ['id_suscriptor'=> $id_suscriptor, 'estatus'=> 1]],

            [['id_suscriptor', 'username', 'password', 'rol', 'password_repeat'], 'required', 'message'=>'El campo {attribute} es requerido.', 'on' => self::SCENARIO_CREATE],

            [['username', 'rol'], 'required', 'message'=>'El campo {attribute} es requerido.', 'on' => self::SCENARIO_UPDATE],
            
            [['id_suscriptor', 'estatus'], 'integer'],

            [['ultimo_acceso'], 'safe'],

            [['username', 'password', 'password_show'], 'string', 'max' => 250],

            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>'Las contraseñas no coinciden, favor de verificar.' ],

            #Limpia los espacios en blanco encontrados en el
            ['username', 'trim'],

            ['password', 'match', 'pattern' => UtilidadesExpReg::CLAVE, 'message'=> 'El campo {attribute} debe contar con un mínimo de 8 caracteres, al menos una letra Minúscula, una letra Mayúscula, un Número y un Caracter especial']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_suscriptor' => 'Id Suscriptor',
            'username' => 'Nombre Usuario',
            'password' => 'Contraseña',
            'password_show' => 'Mostrar Contraseña',
            'ultimo_acceso' => 'Ultimo Acceso',
            'estatus' => 'Estatus',
            'rol' => 'Rol de Usuario',
            'password_repeat' => 'Repetir Contraseña',
            'item_name' => 'Rol',
        ];
    }
}
