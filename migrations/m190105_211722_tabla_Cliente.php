<?php

use yii\db\Migration;

/**
 * Class m190105_211722_tabla_Cliente
 */
class m190105_211722_tabla_Cliente extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Cliente', [
           'id' =>  $this->primaryKey(),
           'razon_social' => $this->string(250)->notNull(),
           'rfc' => $this->string(250),
           'id_giro' => $this->integer()->notNull(),
           'id_pais' => $this->integer()->notNull(),
           'id_estado' => $this->integer()->notNull(),
           'id_municipio' => $this->integer()->notNull(),
           'calle_colonia' => $this->string(250)->notNull(),
           'codigo_postal' => $this->string(7)->notNull(),
           'celular' => $this->string(12)->notNull(),
           'telefono' => $this->string(12)->notNull(),
           'correo' => $this->string(250)->notNull(),
           'cedula_profesional' => $this->string(250),
           'estatus' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
           'bloqueado' => $this->tinyInteger(1)->defaultValue(0)->notNull()
       ]);

       #Nombre de índice, tabla a afectar, columna a relacionar
       $this->createIndex('idx-id_giro', 'Cliente', 'id_giro');
       $this->createIndex('idx-estatus', 'Cliente', 'estatus');
       $this->addCommentOnColumn ( 'Cliente', 'estatus', '1= Activo, 0= Eliminado ' );
       $this->addCommentOnColumn ( 'Cliente', 'bloqueado', '1= Bloqueado por pago, 0= Desbloqueado' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190105_211722_tabla_Cliente cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190105_211722_tabla_Cliente cannot be reverted.\n";

        return false;
    }
    */
}
