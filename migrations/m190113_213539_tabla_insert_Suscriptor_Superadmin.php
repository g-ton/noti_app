<?php

use yii\db\Migration;

/**
 * Class m190113_213539_tabla_insert_Suscriptor_Superadmin
 */
class m190113_213539_tabla_insert_Suscriptor_Superadmin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('Suscriptor', ['razon_social','rfc','id_giro','id_pais','id_estado','id_municipio','calle_colonia','codigo_postal','celular','telefono','correo'], [
            [
            'razon_social' => 'Colorado TI',
            'rfc' => 'HEML920615R17',
            'id_giro' => 1,
            'id_pais' => 1,
            'id_estado' => 21,
            'id_municipio' => 1569,
            'calle_colonia' => 'La loma, Santa Cruz Buenavista',
            'codigo_postal' => '72150',
            'celular' => '2223168167',
            'telefono' => '2843142',
            'correo' => 'jdamianjm@gmail.com',
            ],

        ]);

        $this->batchInsert('Suscriptor_Usuario', ['id_suscriptor','username','password'], [
            [
            'id_suscriptor' => 1,
            'username' => 'superadmin',
            'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b' #La clave está codificada en SHA1 (es: 123456)
            ],

        ]);

        $this->batchInsert('auth_assignment', ['item_name','user_id'], [
            [
            'item_name' => 'superadmin',
            'user_id' => 1,
            ],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190113_213539_tabla_insert_Suscriptor_Superadmin cannot be reverted.\n";

        return false;
    }
}
