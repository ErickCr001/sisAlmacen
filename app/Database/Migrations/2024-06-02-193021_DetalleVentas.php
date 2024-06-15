<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetalleVentas extends Migration
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
            'idVenta' => [
                'type' => 'INT',
            ],
            'idProducto' => [
                'type' => 'INT',
            ],
            'precioProducto' => [
                'type' => 'DECIMAL',
                'constraint' => '8,2',
            ],
            'cantidadProducto' => [
                'type' => 'INT',
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '8,2',
                'null' => FALSE
            ]
        ]);

        // CREANDO TABLA
        $this->forge->addKey('id',TRUE);
        $this->forge->createTable('detalleventas');
    }

    public function down()
    {
        $this->forge->dropTable('detalleventas');
    }
}
