<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Puskesmas extends Model
{
    protected $table = 'puskesmas';
    protected $primaryKey = 'id_puskesmas';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_puskesmas', 'id_kecamatan'];

    public function getNamaPuskesmasById($id_puskesmas)
    {
        $puskesmas = $this->find($id_puskesmas);

        return $puskesmas ? $puskesmas['nama_puskesmas'] : '';
    }
}
