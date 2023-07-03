<?php

namespace App\Models;

use CodeIgniter\Model;

class IklanModel extends Model {
    protected $table    = 'tbliklan';
    protected $primary  = 'id_iklan';
    protected $primaryKey  = 'id_iklan';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['iklan_letak', 'iklan_gambar'];

    protected $skipValidation   = true;
}
