<?php

use yii\db\Migration;

/**
 * Class m190227_031447_tabla_Suscriptor_Horario
 */
class m190227_031447_tabla_Suscriptor_Horario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('Suscriptor_Horario', [
           'id' =>  $this->primaryKey(),
           'id_suscriptor' => $this->integer()->notNull(),
           'lunes' => $this->string(250),
           'martes' => $this->string(250),
           'miercoles' => $this->string(250),
           'jueves' => $this->string(250),
           'viernes' => $this->string(250),
           'sabado' => $this->string(250),
           'domingo' => $this->string(250),
           'dias_festivos' => $this->string(250),
       ]);

       #Nombre de índice, tabla a afectar, columna a relacionar
       $this->createIndex('idx-id_suscriptor', 'Suscriptor_Horario', 'id_suscriptor');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190227_031447_tabla_Suscriptor_Horario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_031447_tabla_Suscriptor_Horario cannot be reverted.\n";

        return false;
    }
    */
}
