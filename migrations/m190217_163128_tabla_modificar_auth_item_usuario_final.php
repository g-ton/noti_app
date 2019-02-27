<?php

use yii\db\Migration;

/**
 * Class m190217_163128_tabla_modificar_auth_item_usuario_final
 */
class m190217_163128_tabla_modificar_auth_item_usuario_final extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('auth_item', 'usuario_final', $this->tinyInteger(1)->defaultValue('0')->after('updated_at'));
        $this->addCommentOnColumn ( 'auth_item', 'usuario_final', '0= Rol no disponible para usuario final, 1= Rol disponible para usuario final' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190217_163128_tabla_modificar_auth_item_usuario_final cannot be reverted.\n";

        return false;
    }
}
