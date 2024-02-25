<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Progres extends Model
{
    protected $table = 'progres';
    protected $primaryKey = 'id_progres';
    protected $returnType = 'array';
    protected $allowedFields = ['nik', 'nama_anak', 'tgl_lahir', 'tgl_ukur', 'tinggi_badan', 'berat_badan'];
}
