<?php

namespace App\Models;

use CodeIgniter\Model;

class m_DataDBD extends Model
{
    protected $table = 'data_dbd';
    protected $primaryKey = 'id_data_dbd';
    protected $returnType = 'array';
    protected $allowedFields = ['id_kelurahan', 'id_tahun', 'jumlah_penduduk', 'perempuan', 'laki_laki', 'balita', 'remaja', 'dewasa', 'jumlah_kasus'];
}
