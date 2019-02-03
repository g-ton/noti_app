<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cat_Municipios".
 *
 * @property int $id
 * @property string $nombre
 */
class CatMunicipios extends \yii\db\ActiveRecord
{
    public function getEstados() {
        return $this->hasMany(CatEstados::className(), ['id' => 'id_estado'])->viaTable('Cat_Estados_Municipios', ['id_municipio' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cat_Municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
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
        ];
    }
}
