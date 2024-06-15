<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    // Definiendo tabla con la que trabajremos a través de este modelo
    protected $table            = 'productos';

    // Definiendo nombre de columna que es primary key de tabla productos
    protected $primaryKey       = 'id';

    /* protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true; */

    // Definiendo que campos de la tabla productos son modificables o para insertar
    protected $allowedFields    = ['codigo','nombre','industria','cantidad','envase','precio_compra','precio_venta','tipo_entrega','foto'];

    /* protected bool $allowEmptyInserts = false; */

    // Dates
    /* protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; */

    // Validation
    /* protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true; */

    // Callbacks
    /* protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = []; */
}
