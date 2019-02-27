<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Suscriptor_Horario".
 *
 * @property int $id
 * @property int $id_suscriptor
 * @property string $lunes
 * @property string $martes
 * @property string $miercoles
 * @property string $jueves
 * @property string $viernes
 * @property string $sabado
 * @property string $domingo
 * @property string $dias_festivos
 */
class SuscriptorHorario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Suscriptor_Horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_suscriptor'], 'required'],
            [['id_suscriptor'], 'integer'],
            [['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'dias_festivos'], 'string', 'max' => 250],
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
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miercoles',
            'jueves' => 'Jueves',
            'viernes' => 'Viernes',
            'sabado' => 'Sabado',
            'domingo' => 'Domingo',
            'dias_festivos' => 'Dias Festivos',
        ];
    }
}
