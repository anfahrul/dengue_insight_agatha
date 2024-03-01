<?php

namespace App\Models;

use CodeIgniter\Model;

class m_GeoLocationFile extends Model
{
    protected $table = 'geo_location_file';
    protected $primaryKey = 'id_geo_location_file';
    protected $returnType = 'array';
    protected $allowedFields = ['file_name'];
}
