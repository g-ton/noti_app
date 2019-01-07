<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cat_Clasificacion_Giro".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $estatus
 */
class CatClasificacionGiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cat_Clasificacion_Giro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estatus'], 'integer'],
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
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'estatus' => 'Estatus',
        ];
    }
}
