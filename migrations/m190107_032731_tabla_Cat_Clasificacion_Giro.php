<?php

use yii\db\Migration;

/**
 * Class m190107_032731_tabla_Cat_Clasificacion_Giro
 */
class m190107_032731_tabla_Cat_Clasificacion_Giro extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Cat_Clasificacion_Giro', [
           'id' =>  $this->primaryKey(),
           'nombre' => $this->string(250)->notNull(),
           'descripcion' => $this->string(250),
           'estatus' => $this->tinyInteger(1)->defaultValue(1)->notNull()
       ], 'ENGINE=MyISAM');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190107_032731_tabla_Cat_Clasificacion_Giro cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190107_032731_tabla_Cat_Clasificacion_Giro cannot be reverted.\n";

        return false;
    }
    */
}
