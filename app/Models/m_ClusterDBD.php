<?php

namespace App\Models;

use CodeIgniter\Model;

class m_ClusterDBD extends Model
{
    protected $table = 'cluster_dbd';
    protected $primaryKey = 'id_cluster';
    protected $returnType = 'array';
    protected $allowedFields = ['c1a', 'c1b', 'c1c', 'c1d', 'c1e', 'c1f', 'c2a', 'c2b', 'c2c', 'c2d', 'c2e', 'c2f', 'c3a', 'c3b', 'c3c', 'c3d', 'c3e', 'c3f'];

    public function getOrderById()
    {
        return $this->orderBy('id_cluster', 'DESC');
    }
}
