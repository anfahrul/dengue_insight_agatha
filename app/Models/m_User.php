<?php

namespace App\Models;

use CodeIgniter\Model;

class m_User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'usertype', 'email'];
}
