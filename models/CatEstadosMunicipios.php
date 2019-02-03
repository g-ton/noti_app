<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cat_Estados_Municipios".
 *
 * @property int $id
 * @property int $id_estado
 * @property int $id_municipio
 */
class CatEstadosMunicipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cat_Estados_Municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estado', 'id_municipio'], 'required'],
            [['id_estado', 'id_municipio'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_estado' => 'Id Estado',
            'id_municipio' => 'Id Municipio',
        ];
    }
}
