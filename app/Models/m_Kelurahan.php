<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $returnType = 'array';
    protected $allowedFields = ['nama_kelurahan', 'id_kecamatan', 'id_puskesmas'];

    public function getNamaKelurahanById($id_kelurahan)
    {
        $kelurahan = $this->find($id_kelurahan);

        return $kelurahan ? $kelurahan['nama_kelurahan'] : '';
    }
    
    public function getLatById($id_kelurahan)
    {
        $kelurahan = $this->find($id_kelurahan);

        return $kelurahan ? $kelurahan['lat'] : '';
    }
    
    public function getLonById($id_kelurahan)
    {
        $kelurahan = $this->find($id_kelurahan);

        return $kelurahan ? $kelurahan['lon'] : '';
    }
}
