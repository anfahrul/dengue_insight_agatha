<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Tahun extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id_tahun';
    protected $returnType = 'array';
    protected $allowedFields = ['tahun'];

    public function getNamaTahunById($id_tahun)
    {
        $tahun = $this->find($id_tahun);

        return $tahun ? $tahun['tahun'] : '';
    }

    public function getOrderById()
    {
        return $this->orderBy('id_tahun', 'DESC');
    }
}
