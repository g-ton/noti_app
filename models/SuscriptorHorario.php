<?php

namespace app\models;

use Yii;
use app\utilidades\UtilidadesExpReg;

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
 * @property int $labora_festivo
 */
class SuscriptorHorario extends \yii\db\ActiveRecord
{
    public $des_lun_t_a; #Desde Lunes turno 1
    public $has_lun_t_a; #Hasta Lunes turno 1
    public $des_mar_t_a;
    public $has_mar_t_a;
    public $des_mie_t_a;
    public $has_mie_t_a;
    public $des_jue_t_a;
    public $has_jue_t_a;
    public $des_vie_t_a;
    public $has_vie_t_a;
    public $des_sab_t_a;
    public $has_sab_t_a;
    public $des_dom_t_a;
    public $has_dom_t_a;

    public $des_lun_t_b; #Desde Lunes turno 2
    public $has_lun_t_b; #Hasta Lunes turno 2
    public $des_mar_t_b;
    public $has_mar_t_b;
    public $des_mie_t_b;
    public $has_mie_t_b;
    public $des_jue_t_b;
    public $has_jue_t_b;
    public $des_vie_t_b;
    public $has_vie_t_b;
    public $des_sab_t_b;
    public $has_sab_t_b;
    public $des_dom_t_b;
    public $has_dom_t_b;

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
            [['id_suscriptor', 'labora_festivo'], 'required'],
            [['id_suscriptor', 'labora_festivo'], 'integer'],
            [['des_lun_t_a', 'has_lun_t_a','des_mar_t_a', 'has_mar_t_a','des_mie_t_a', 'has_mie_t_a','des_jue_t_a', 'has_jue_t_a','des_vie_t_a', 'has_vie_t_a','des_sab_t_a', 'has_sab_t_a','des_dom_t_a', 'has_dom_t_a'], 'match', 'pattern' => UtilidadesExpReg::HORA_24, 'message' => 'El campo {attribute} es inválido, aceptado hora en formato 24 hrs, ej: (19:30)'],
            [['des_lun_t_b', 'has_lun_t_b','des_mar_t_b', 'has_mar_t_b','des_mie_t_b', 'has_mie_t_b','des_jue_t_b', 'has_jue_t_b','des_vie_t_b', 'has_vie_t_b','des_sab_t_b', 'has_sab_t_b','des_dom_t_b', 'has_dom_t_b'], 'match', 'pattern' => UtilidadesExpReg::HORA_24, 'message' => 'El campo {attribute} es inválido, aceptado hora en formato 24 hrs, ej: (19:30)'],
            #Turno 1
            #Lunes
            ['des_lun_t_a', 'default', 'value' => null], ['has_lun_t_a', 'default', 'value' => null],
            #Validar que si el turno 2 tiene datos el turno 1 tenga que ser forzoso capturarlo (validar_turno2_teniendo_turno1)
            ['des_lun_t_a', 'required', 'when' => function($model) {return $model->has_lun_t_a != null || $model->des_lun_t_b != null ? true : false;}],
            ['has_lun_t_a', 'required', 'when' => function($model) {return $model->des_lun_t_a != null || $model->has_lun_t_b != null ? true : false;}],
            #Martes
            ['des_mar_t_a', 'default', 'value' => null], ['has_mar_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_mar_t_a', 'required', 'when' => function($model) {return $model->has_mar_t_a != null || $model->des_mar_t_b != null ? true : false;}],
            ['has_mar_t_a', 'required', 'when' => function($model) {return $model->des_mar_t_a != null || $model->has_mar_t_b != null ? true : false;}],
            #Miércoles
            ['des_mie_t_a', 'default', 'value' => null], ['has_mie_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_mie_t_a', 'required', 'when' => function($model) {return $model->has_mie_t_a != null || $model->des_mie_t_b != null ? true : false;}],
            ['has_mie_t_a', 'required', 'when' => function($model) {return $model->des_mie_t_a != null || $model->has_mie_t_b != null ? true : false;}],
            #Jueves
            ['des_jue_t_a', 'default', 'value' => null], ['has_jue_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_jue_t_a', 'required', 'when' => function($model) {return $model->has_jue_t_a != null || $model->des_jue_t_b != null ? true : false;}],
            ['has_jue_t_a', 'required', 'when' => function($model) {return $model->des_jue_t_a != null || $model->has_jue_t_b != null ? true : false;}],
            #Viernes
            ['des_vie_t_a', 'default', 'value' => null], ['has_vie_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_vie_t_a', 'required', 'when' => function($model) {return $model->has_vie_t_a != null || $model->des_vie_t_b != null ? true : false;}],
            ['has_vie_t_a', 'required', 'when' => function($model) {return $model->des_vie_t_a != null || $model->has_vie_t_b != null ? true : false;}],
            #Sábado
            ['des_sab_t_a', 'default', 'value' => null], ['has_sab_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_sab_t_a', 'required', 'when' => function($model) {return $model->has_sab_t_a != null || $model->des_sab_t_b != null ? true : false;}],
            ['has_sab_t_a', 'required', 'when' => function($model) {return $model->des_sab_t_a != null || $model->has_sab_t_b != null ? true : false;}],
            #Domingo
            ['des_dom_t_a', 'default', 'value' => null], ['has_dom_t_a', 'default', 'value' => null],
            #validar_turno2_teniendo_turno1
            ['des_dom_t_a', 'required', 'when' => function($model) {return $model->has_dom_t_a != null || $model->des_dom_t_b != null ? true : false;}],
            ['has_dom_t_a', 'required', 'when' => function($model) {return $model->des_dom_t_a != null || $model->has_dom_t_b != null ? true : false;}],
            #Turno 2
            #Lunes
            ['des_lun_t_b', 'default', 'value' => null], ['has_lun_t_b', 'default', 'value' => null],
            ['des_lun_t_b', 'required', 'when' => function($model) {return $model->has_lun_t_b !== null;}],
            ['has_lun_t_b', 'required', 'when' => function($model) {return $model->des_lun_t_b !== null;}],
            #Martes
            ['des_mar_t_b', 'default', 'value' => null], ['has_mar_t_b', 'default', 'value' => null],
            ['des_mar_t_b', 'required', 'when' => function($model) {return $model->has_mar_t_b !== null;}],
            ['has_mar_t_b', 'required', 'when' => function($model) {return $model->des_mar_t_b !== null;}],
            #Miércoles
            ['des_mie_t_b', 'default', 'value' => null], ['has_mie_t_b', 'default', 'value' => null],
            ['des_mie_t_b', 'required', 'when' => function($model) {return $model->has_mie_t_b !== null;}],
            ['has_mie_t_b', 'required', 'when' => function($model) {return $model->des_mie_t_b !== null;}],
            #Jueves
            ['des_jue_t_b', 'default', 'value' => null], ['has_jue_t_b', 'default', 'value' => null],
            ['des_jue_t_b', 'required', 'when' => function($model) {return $model->has_jue_t_b !== null;}],
            ['has_jue_t_b', 'required', 'when' => function($model) {return $model->des_jue_t_b !== null;}],
            #Viernes
            ['des_vie_t_b', 'default', 'value' => null], ['has_vie_t_b', 'default', 'value' => null],
            ['des_vie_t_b', 'required', 'when' => function($model) {return $model->has_vie_t_b !== null;}],
            ['has_vie_t_b', 'required', 'when' => function($model) {return $model->des_vie_t_b !== null;}],
            #Sábado
            ['des_sab_t_b', 'default', 'value' => null], ['has_sab_t_b', 'default', 'value' => null],
            ['des_sab_t_b', 'required', 'when' => function($model) {return $model->has_sab_t_b !== null;}],
            ['has_sab_t_b', 'required', 'when' => function($model) {return $model->des_sab_t_b !== null;}],
            #Domingo
            ['des_dom_t_b', 'default', 'value' => null], ['has_dom_t_b', 'default', 'value' => null],
            ['des_dom_t_b', 'required', 'when' => function($model) {return $model->has_dom_t_b !== null;}],
            ['has_dom_t_b', 'required', 'when' => function($model) {return $model->des_dom_t_b !== null;}]
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
            'des_lun_t_a' => 'Desde',
            'has_lun_t_a' => 'Hasta',
            'des_mar_t_a' => 'Desde',
            'has_mar_t_a' => 'Hasta',
            'des_mie_t_a' => 'Desde',
            'has_mie_t_a' => 'Hasta',
            'des_jue_t_a' => 'Desde',
            'has_jue_t_a' => 'Hasta',
            'des_vie_t_a' => 'Desde',
            'has_vie_t_a' => 'Hasta',
            'des_sab_t_a' => 'Desde',
            'has_sab_t_a' => 'Hasta',
            'des_dom_t_a' => 'Desde',
            'has_dom_t_a' => 'Hasta',
            #Turno 2
            'des_lun_t_b' => 'Desde',
            'has_lun_t_b' => 'Hasta',
            'des_mar_t_b' => 'Desde',
            'has_mar_t_b' => 'Hasta',
            'des_mie_t_b' => 'Desde',
            'has_mie_t_b' => 'Hasta',
            'des_jue_t_b' => 'Desde',
            'has_jue_t_b' => 'Hasta',
            'des_vie_t_b' => 'Desde',
            'has_vie_t_b' => 'Hasta',
            'des_sab_t_b' => 'Desde',
            'has_sab_t_b' => 'Hasta',
            'des_dom_t_b' => 'Desde',
            'has_dom_t_b' => 'Hasta',
            'labora_festivo' => '¿Labora día Festivos?',
        ];
    }
}
