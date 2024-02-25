<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_kecamatan'];
}
