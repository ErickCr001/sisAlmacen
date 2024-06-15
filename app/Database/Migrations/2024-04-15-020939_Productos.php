<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
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
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],
            'industria' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE //SELECT
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => FALSE
            ],
            'envase' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE //RADIO
            ],
            'precio_compra' => [
                'type' => 'decimal',
                'constraint' => '8,2',
                'null' => FALSE
            ],
            'precio_venta' => [
                'type' => 'decimal',
                'constraint' => '8,2',
                'null' => FALSE
            ],
            'tipo_entrega' => [
                'type' => 'varchar',
                'constraint' => '60',
                'null' => FALSE //CHECKBOX
            ],
            'foto' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => FALSE 
            ],
        ]);

        // CREANDO TABLA
        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('productos');
    }

    public function down()
    {
        $this->forge->dropTable('productos');
    }
}
