<?php

namespace app\models;

use Yii;
use app\utilidades\UtilidadesExpReg;

/**
 * This is the model class for table "Suscriptor".
 *
 * @property int $id
 * @property string $razon_social
 * @property string $rfc
 * @property int $id_giro
 * @property int $id_pais
 * @property int $id_estado
 * @property int $id_municipio
 * @property string $calle_colonia
 * @property string $codigo_postal
 * @property string $celular
 * @property string $telefono
 * @property string $correo
 * @property string $cedula_profesional
 * @property int $estatus 1= Activo, 0= Eliminado 
 * @property int $bloqueado 1= Bloqueado por pago, 0= Desbloqueado
 */
class Suscriptor extends \yii\db\ActiveRecord
{
    public $imagenes;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Suscriptor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['correo', 'unique', 'filter' => ['estatus'=> 1], 'message'=> 'El {attribute} ya ha sido utilizado para otro Suscriptor'],
            [['razon_social', 'id_giro', 'id_pais', 'id_estado', 'id_municipio', 'calle_colonia', 'codigo_postal', 'celular', 'telefono', 'correo'], 'required'],
            [['id_giro', 'id_pais', 'id_estado', 'id_municipio', 'estatus', 'bloqueado'], 'integer'],
            [['razon_social', 'rfc', 'calle_colonia', 'correo', 'cedula_profesional'], 'string', 'max' => 250],
            [['celular', 'telefono'], 'string', 'max' => 14],
            ['codigo_postal', 'string', 'max' => 7],
            ['rfc', 'match', 'pattern' => UtilidadesExpReg::RFC, 'message'=>'El campo {attribute} es inválido.'],
            ['codigo_postal', 'match', 'pattern' => UtilidadesExpReg::CARACTERES_NUMERICO, 'message'=>'El campo {attribute} es inválido, sólo son aceptados dígitos.'],
            ['correo', 'match', 'pattern' => UtilidadesExpReg::CORREO_ELECTRONICO, 'message'=>'El campo {attribute} es inválido.']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'razon_social' => 'Razón Social ó Nombre Comercial',
            'rfc' => 'RFC',
            'id_giro' => 'Giro',
            'id_pais' => 'País',
            'id_estado' => 'Estado',
            'id_municipio' => 'Municipio',
            'calle_colonia' => 'Calle y Colonia',
            'codigo_postal' => 'Código Postal',
            'celular' => 'Celular',
            'telefono' => 'Teléfono',
            'correo' => 'Correo Electrónico',
            'cedula_profesional' => 'Cédula Profesional',
            'estatus' => 'Estatus',
            'bloqueado' => 'Bloqueado',
            'imagenes' => 'imagenes',
        ];
    }
}
