<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Suscriptor_Imagen".
 *
 * @property int $id
 * @property int $id_suscriptor
 * @property string $nombre Nombre interno de la imagen usado para obtener la ruta completa de ésta
 * @property string $descripcion Nombre - descripción usado por el usuario final para la imagen
 * @property int $estatus
 */
class SuscriptorImagen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Suscriptor_Imagen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_suscriptor', 'nombre', 'descripcion'], 'required'],
            [['id_suscriptor', 'estatus'], 'integer'],
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
            'id_suscriptor' => 'Id Suscriptor',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'estatus' => 'Estatus',
        ];
    }
}
