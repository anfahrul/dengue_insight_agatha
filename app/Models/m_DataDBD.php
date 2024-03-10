<?php

namespace App\Models;

use CodeIgniter\Model;

class m_DataDBD extends Model
{
    protected $table = 'data_dbd';
    protected $primaryKey = 'id_data_dbd';
    protected $returnType = 'array';
    protected $allowedFields = ['id_kelurahan', 'id_tahun', 'jumlah_penduduk', 'perempuan', 'laki_laki', 'balita', 'remaja', 'dewasa', 'jumlah_kasus'];

    public function findAllGroupByIdKelurahan() {
        $this->select('id_kelurahan');
        $this->selectSum('jumlah_penduduk', 'jumlah_penduduk');
        $this->selectSum('perempuan', 'perempuan');
        $this->selectSum('laki_laki', 'laki_laki');
        $this->selectSum('balita', 'balita');
        $this->selectSum('remaja', 'remaja');
        $this->selectSum('dewasa', 'dewasa');
        $this->selectSum('jumlah_kasus', 'jumlah_kasus');
        $this->groupBy('id_kelurahan');

        return $this->findAll();
    }
}
