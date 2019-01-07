<?php

namespace app\utilidades;

use Yii;
use app\models\CatClasificacionGiro;

class Utilidades{
	
	/**
     * Devuelve las clasificaciones de giro disponibles para el usuario súper admin
     */
    public static function getClasificacionesGiro(){
        $tres_meses= (3600 * 24 * 30) * 3;
        $cla_giros = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Clasificacion_Giro WHERE estatus=1')->cache($tres_meses)->queryAll();
        $cla_giros = \yii\helpers\ArrayHelper::map($cla_giros, 'id', 'nombre');

        return $cla_giros;
    }
}