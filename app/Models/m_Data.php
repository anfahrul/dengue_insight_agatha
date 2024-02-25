<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    protected $returnType = 'array';
    protected $allowedFields = ['nik', 'nama_anak', 'tgl_lahir', 'jk', 'nama_ortu', 'tgl_ukur', 'tinggi_anak', 'berat_anak', 'lat', 'long'];
}
