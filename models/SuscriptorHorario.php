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
            [['id_suscriptor', 'labora_festivo'], 'integer'],
            [['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'], 'string', 'max' => 250],
            #Lunes
            ['des_lun_t_a', 'default', 'value' => null], ['has_lun_t_a', 'default', 'value' => null],
            ['des_lun_t_a', 'required', 'when' => function($model) {return $model->has_lun_t_a !== null;}],
            ['has_lun_t_a', 'required', 'when' => function($model) {return $model->des_lun_t_a !== null;}],
            #Martes
            ['des_mar_t_a', 'default', 'value' => null], ['has_mar_t_a', 'default', 'value' => null],
            ['des_mar_t_a', 'required', 'when' => function($model) {return $model->has_mar_t_a !== null;}],
            ['has_mar_t_a', 'required', 'when' => function($model) {return $model->des_mar_t_a !== null;}],
            #Miércoles
            ['des_mie_t_a', 'default', 'value' => null], ['has_mie_t_a', 'default', 'value' => null],
            ['des_mie_t_a', 'required', 'when' => function($model) {return $model->has_mie_t_a !== null;}],
            ['has_mie_t_a', 'required', 'when' => function($model) {return $model->des_mie_t_a !== null;}],
            #Jueves
            ['des_jue_t_a', 'default', 'value' => null], ['has_jue_t_a', 'default', 'value' => null],
            ['des_jue_t_a', 'required', 'when' => function($model) {return $model->has_jue_t_a !== null;}],
            ['has_jue_t_a', 'required', 'when' => function($model) {return $model->des_jue_t_a !== null;}],
            #Viernes
            ['des_vie_t_a', 'default', 'value' => null], ['has_vie_t_a', 'default', 'value' => null],
            ['des_vie_t_a', 'required', 'when' => function($model) {return $model->has_vie_t_a !== null;}],
            ['has_vie_t_a', 'required', 'when' => function($model) {return $model->des_vie_t_a !== null;}],
            #Sábado
            ['des_sab_t_a', 'default', 'value' => null], ['has_sab_t_a', 'default', 'value' => null],
            ['des_sab_t_a', 'required', 'when' => function($model) {return $model->has_sab_t_a !== null;}],
            ['has_sab_t_a', 'required', 'when' => function($model) {return $model->des_sab_t_a !== null;}],
            #Domingo
            ['des_dom_t_a', 'default', 'value' => null], ['has_dom_t_a', 'default', 'value' => null],
            ['des_dom_t_a', 'required', 'when' => function($model) {return $model->has_dom_t_a !== null;}],
            ['has_dom_t_a', 'required', 'when' => function($model) {return $model->des_dom_t_a !== null;}],
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
            /*'des_lun_t_a' => 'Desde',
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
            'labora_festivo' => 'Laborable en días Festivos',*/
        ];
    }
}
