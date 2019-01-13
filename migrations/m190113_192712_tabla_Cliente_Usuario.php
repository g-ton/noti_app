<?php

use yii\db\Migration;

/**
 * Class m190113_192712_tabla_Cliente_Usuario
 */
class m190113_192712_tabla_Cliente_Usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('Cliente_Usuario', [
           'id' =>  $this->primaryKey(),
           'id_cliente' => $this->integer()->notNull(),
           'username' => $this->string(250)->notNull(),
           'password' => $this->string(250)->notNull(),
           'ultimo_acceso' => $this->dateTime()->defaultValue(NULL),
           'estatus' => $this->tinyInteger(1)->defaultValue(1)->notNull()
       ]);

        $this->createIndex('idx-id_cliente', 'Cliente_Usuario', 'id_cliente');
        $this->addCommentOnColumn ( 'Cliente_Usuario', 'estatus', '1= Activo, 0= Eliminado ' );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190113_192712_tabla_Cliente_Usuario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190113_192712_tabla_Cliente_Usuario cannot be reverted.\n";

        return false;
    }
    */
}
