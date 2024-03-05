<?php

namespace App\Models;

use CodeIgniter\Model;

class m_IdentificationHistory extends Model
{
    protected $table = 'identification_history';
    protected $primaryKey = 'id_identification_history';
    protected $returnType = 'array';
    protected $allowedFields = ['date'];

    public function getOrderById()
    {
        return $this->orderBy('id_identification_history', 'DESC');
    }
}
