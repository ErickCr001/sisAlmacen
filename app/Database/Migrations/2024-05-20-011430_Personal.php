<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Personal extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5, // tamaño
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'ci' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],
            'paterno' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],
            'materno' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],
            'celular' => [
                'type' => 'INT',
                'constraint' => 20,
                'null' => FALSE
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
                'null' => FALSE
            ],
        ]);

        // CREANDO TABLA
        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('personal');
    }

    public function down()
    {
        //
        $this->forge->dropTable('personal');
    }
}
