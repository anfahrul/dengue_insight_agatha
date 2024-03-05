<?php

namespace App\Models;

use CodeIgniter\Model;

class m_IdentificationHistoryCluster extends Model
{
    protected $table = 'identification_history_cluster';
    protected $primaryKey = 'id_identification_history_cluster';
    protected $returnType = 'array';
    protected $allowedFields = ['id_identification_history', 'id_kelurahan', 'cluster'];

    public function getOrderById()
    {
        return $this->orderBy('id_identification_history_cluster', 'DESC');
    }

    public function getByIdIdentificationHistory($id_identification_history)
    {
        $data = $this->where('id_identification_history', $id_identification_history)->findAll();

        return $data ? $data : '';
    }
}
