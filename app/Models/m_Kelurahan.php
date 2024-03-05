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
    
    public function getObjectIdById($id_kelurahan)
    {
        $kelurahan = $this->find($id_kelurahan);

        return $kelurahan ? $kelurahan['object_id'] : '';
    }
    
    public function getIdByNamaKelurahan($nama_kelurahan)
    {
        $kelurahan = $this->where('nama_kelurahan', $nama_kelurahan)->first();

        return $kelurahan ? $kelurahan['id_kelurahan'] : null;
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
