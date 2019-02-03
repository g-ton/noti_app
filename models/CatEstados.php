<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cat_Estados".
 *
 * @property int $id
 * @property string $nombre
 */
class CatEstados extends \yii\db\ActiveRecord
{
    public function getMunicipios() {
        return $this->hasMany(CatMunicipios::className(), ['id' => 'id_municipio'])->viaTable('Cat_Estados_Municipios', ['id_estado' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cat_Estados';
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
