<?php

use yii\db\Migration;

/**
 * Class m190113_192712_tabla_Suscriptor_Usuario
 */
class m190113_192712_tabla_Suscriptor_Usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('Suscriptor_Usuario', [
           'id' =>  $this->primaryKey(),
           'id_suscriptor' => $this->integer()->notNull(),
           'username' => $this->string(250)->notNull(),
           'password' => $this->string(250)->notNull(),
           'password_show' => $this->string(250),
           'ultimo_acceso' => $this->dateTime()->defaultValue(NULL),
           'estatus' => $this->tinyInteger(1)->defaultValue(1)->notNull()
       ]);

        $this->createIndex('idx-id_suscriptor', 'Suscriptor_Usuario', 'id_suscriptor');
        $this->addCommentOnColumn ( 'Suscriptor_Usuario', 'estatus', '1= Activo, 0= Eliminado ' );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190113_192712_tabla_Suscriptor_Usuario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190113_192712_tabla_Suscriptor_Usuario cannot be reverted.\n";

        return false;
    }
    */
}
