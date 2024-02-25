<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_kelurahan', 'id_kecamatan', 'id_puskesmas'];
}
