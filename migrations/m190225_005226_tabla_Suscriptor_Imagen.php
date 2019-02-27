<?php

use yii\db\Migration;

/**
 * Class m190225_005226_tabla_Suscriptor_Imagen
 */
class m190225_005226_tabla_Suscriptor_Imagen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Suscriptor_Imagen', [
           'id' =>  $this->primaryKey(),
           'id_suscriptor' => $this->integer()->notNull(),
           'nombre' => $this->string(250)->notNull(),
           'descripcion' => $this->string(250)->notNull(),
           'estatus' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
       ]);

       #Nombre de índice, tabla a afectar, columna a relacionar
       $this->createIndex('idx-id_suscriptor', 'Suscriptor_Imagen', 'id_suscriptor');
       $this->addCommentOnColumn ( 'Suscriptor_Imagen', 'nombre', 'Nombre interno de la imagen usado para obtener la ruta completa de ésta' );
       $this->addCommentOnColumn ( 'Suscriptor_Imagen', 'descripcion', 'Nombre - descripción usado por el usuario final para la imagen' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190225_005226_tabla_Suscriptor_Imagen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_005226_tabla_Suscriptor_Imagen cannot be reverted.\n";

        return false;
    }
    */
}
