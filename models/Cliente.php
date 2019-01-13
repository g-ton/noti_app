<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente".
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
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['razon_social', 'id_giro', 'id_pais', 'id_estado', 'id_municipio', 'calle_colonia', 'codigo_postal', 'celular', 'telefono', 'correo'], 'required'],
            [['id_giro', 'id_pais', 'id_estado', 'id_municipio', 'estatus', 'bloqueado'], 'integer'],
            [['razon_social', 'rfc', 'calle_colonia', 'correo', 'cedula_profesional'], 'string', 'max' => 250],
            [['codigo_postal'], 'string', 'max' => 7],
            [['celular', 'telefono'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'razon_social' => 'Razon Social',
            'rfc' => 'Rfc',
            'id_giro' => 'Giro',
            'id_pais' => 'Pais',
            'id_estado' => 'Estado',
            'id_municipio' => 'Municipio',
            'calle_colonia' => 'Calle/Colonia',
            'codigo_postal' => 'Codigo Postal',
            'celular' => 'Celular',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'cedula_profesional' => 'Cédula Profesional',
            'estatus' => 'Estatus',
            'bloqueado' => 'Bloqueado',
        ];
    }
}
