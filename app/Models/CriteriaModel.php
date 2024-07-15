<?php

namespace App\Models;

use CodeIgniter\Model;

class CriteriaModel extends Model
{
    protected $table            = 'tb_criteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['indicator_id','name','weight','normalized_weight'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    // function
    public function getAllCriteria()
    {
        return $this->select('tb_criteria.*, tb_indicator.name as indicator_name')
                    ->join('tb_indicator', 'tb_criteria.indicator_id = tb_indicator.id')
                    ->findAll();
    }

    public function getTotalWeight()
    {
        return $this->selectSum('weight')->get()->getRow()->weight;
    }

    public function getCriteriaWithNormalizedWeight()
    {
        $totalWeight = $this->getTotalWeight();
        $criteria = $this->getAllCriteria();

        foreach ($criteria as &$criterion) {
            $normalizedWeight = $criterion['weight'] / $totalWeight;
            $normalizedWeight = number_format($normalizedWeight, 2);
            $criterion['normalized_weight'] = $normalizedWeight;
            $this->update($criterion['id'], ['normalized_weight' => $normalizedWeight]);
        }

        return $criteria;
    }
}
