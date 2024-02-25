<?php

namespace App\Models;

use CodeIgniter\Model;

class m_Cluster extends Model
{
    protected $table = 'cluster';
    protected $primaryKey = 'id_cluster';
    protected $returnType = 'array';
    protected $allowedFields = ['c1x', 'c2x', 'c3x', 'c1y', 'c2y', 'c3y', 'c1z', 'c2z', 'c3z'];
}
