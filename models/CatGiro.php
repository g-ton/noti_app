<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cat_Giro".
 *
 * @property int $id
 * @property int $id_clasificacion_giro
 * @property string $nombre
 * @property string $descripcion
 * @property int $estatus
 */
class CatGiro extends \yii\db\ActiveRecord
{
    public function getClasificacionGiro()
    {
       return $this->hasOne(CatClasificacionGiro::className(), ['id' => 'id_clasificacion_giro']);
    }

    public function getNombreClasificacion()
    {
        return $this->clasificacionGiro->nombre;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cat_Giro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clasificacion_giro', 'nombre'], 'required'],
            [['id_clasificacion_giro', 'estatus'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_clasificacion_giro' => 'Clasificación de Giro',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'estatus' => 'Estatus',
        ];
    }
}
