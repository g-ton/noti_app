<?php

use yii\db\Migration;

/**
 * Class m190105_204719_creacion_roles
 */
class m190105_204719_creacion_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(){
       $auth = Yii::$app->authManager;

       $superadmin = $auth->createRole('superadmin');
       $auth->add($superadmin);

       $admin = $auth->createRole('admin');
       $auth->add($admin);

       $asistente = $auth->createRole('asistente');
       $auth->add($asistente);

       $consulta = $auth->createRole('consulta');
       $auth->add($consulta);
    }

    public function down(){
       $auth = Yii::$app->authManager;

       $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190105_204719_creacion_roles cannot be reverted.\n";

        return false;
    }
    */
}
