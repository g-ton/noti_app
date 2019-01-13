<?php

use yii\db\Migration;

/**
 * Class m190113_191558_tabla_insert_Cat_Clasificacion_Giro
 */
class m190113_191558_tabla_insert_Cat_Clasificacion_Giro extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('Cat_Clasificacion_Giro', ['nombre','descripcion'], [
            ['nombre' => 'Salud','descripcion' => 'Área de la Salud (Dentistas, Ginecólogos, etc.)'],
            ['nombre' => 'Belleza','descripcion' => 'Spas, estéticas, barberías, etc.'],
            ['nombre' => 'Alimentos','descripcion' => 'Bar, restaurantes, cafés, etc.'],
            ['nombre' => 'Automotríz','descripcion' => 'Talleres mecánicos, ojalaterías, agencias automotrices, etc.'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190113_191558_tabla_insert_Cat_Clasificacion_Giro cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190113_191558_tabla_insert_Cat_Clasificacion_Giro cannot be reverted.\n";

        return false;
    }
    */
}
