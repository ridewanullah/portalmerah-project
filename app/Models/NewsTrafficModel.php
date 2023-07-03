<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsTrafficModel extends Model {
    protected $table    = 'tblnewstraffic';
    protected $primary  = 'id_newstraffic';
    protected $primaryKey  = 'id_newstraffic';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_newstraffic', 'ip_address', 'id_artikel'];

    protected $skipValidation   = true;
}
