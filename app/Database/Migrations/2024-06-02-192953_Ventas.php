<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ventas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5, // tamaño
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'fecha' => [
                'type' => 'DATE',
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '8,2',
                'null' => FALSE
            ],
            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE //SELECT
            ]
        ]);

        // CREANDO TABLA
        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('ventas');
    }

    public function down()
    {
        $this->forge->dropTable('ventas');
    }
}
