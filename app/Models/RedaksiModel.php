<?php

namespace App\Models;

use CodeIgniter\Model;

class RedaksiModel extends Model {
    protected $table    = 'tblredaksi';
    protected $primary  = 'id_redaksi';
    protected $primaryKey  = 'id_redaksi';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['susunan_redaksi'];

    protected $skipValidation   = true;
}
