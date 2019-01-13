<?php

use yii\db\Migration;

/**
 * Class m190113_191634_tabla_insert_Cat_Giro
 */
class m190113_191634_tabla_insert_Cat_Giro extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->batchInsert('Cat_Giro', ['id_clasificacion_giro','nombre','descripcion'], [
            ['id_clasificacion_giro' => 1,'nombre' => 'Dentista',           'descripcion' => ''],
            ['id_clasificacion_giro' => 1,'nombre' => 'Ginecólogo',         'descripcion' => ''],
            ['id_clasificacion_giro' => 1,'nombre' => 'Oftalmólogo',        'descripcion' => ''],
            ['id_clasificacion_giro' => 1,'nombre' => 'Urólogo',            'descripcion' => ''],
            ['id_clasificacion_giro' => 1,'nombre' => 'Alergólogo',         'descripcion' => ''],
            ['id_clasificacion_giro' => 1,'nombre' => 'Nefrólogo',          'descripcion' => 'Especializado en el riñón'],
            ['id_clasificacion_giro' => 1,'nombre' => 'Psicólogo',          'descripcion' => ''],
            ['id_clasificacion_giro' => 2,'nombre' => 'Spa',                'descripcion' => ''],
            ['id_clasificacion_giro' => 3,'nombre' => 'Bar',                'descripcion' => ''],
            ['id_clasificacion_giro' => 3,'nombre' => 'Restaurante - Bar',  'descripcion' => ''],
            ['id_clasificacion_giro' => 4,'nombre' => 'Agencia Automotríz', 'descripcion' => ''],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190113_191634_tabla_insert_Cat_Giro cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190113_191634_tabla_insert_Cat_Giro cannot be reverted.\n";

        return false;
    }
    */
}
