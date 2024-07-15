<?php

namespace App\Models;

use CodeIgniter\Model;

class IndicatorModel extends Model
{
    protected $table            = 'tb_indicator';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // function
    public function getIndicators()
    {
        return $this->findAll();
    }
}
