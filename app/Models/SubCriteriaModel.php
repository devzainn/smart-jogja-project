<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCriteriaModel extends Model
{
    protected $table            = 'tb_sub_criteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','utility_score','criteria_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllSubCriteria()
    {
        return $this->select('tb_sub_criteria.*, tb_criteria.name as criteria_name')
                    ->join('tb_criteria', 'tb_sub_criteria.criteria_id = tb_criteria.id')
                    ->findAll();
    }    
}
