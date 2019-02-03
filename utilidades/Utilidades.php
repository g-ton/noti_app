<?php

namespace app\utilidades;

use Yii;
use app\models\CatClasificacionGiro;
use yii\web\Response;
use app\models\CatEstados;


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

    /**
     * [getGiros Devuelve el listado de Giros existentes en el sistema]
     *
     * @return [array]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public static function getGiros(){
        $tres_meses= (3600 * 24 * 30) * 3;
        $giros = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Giro WHERE estatus=1')->cache($tres_meses)->queryAll();
        $giros = \yii\helpers\ArrayHelper::map($giros, 'id', 'nombre');

        return $giros;
    }

    /**
     * [getGiros Devuelve el listado de Estados de la república mexicana]
     *
     * @return [array]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public static function getEstados(){
        $doce_meses= (3600 * 24 * 30) * 12;
        $estados = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Estados')->cache($doce_meses)->queryAll();
        $estados = \yii\helpers\ArrayHelper::map($estados, 'id', 'nombre');

        return $estados;
    }

    /**
     * [actionObtenerMunicipios Obtenemos los municipios (lista) por id de estado]
     * id_estado -> id del estado
     * @return [arreglo en formato json]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public function getMunicipios($id_estado)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $estado= CatEstados::findOne($id_estado);
        return \yii\helpers\ArrayHelper::map($estado->municipios, 'id', 'nombre');
    }
}