<?php

namespace App\Models;

use CodeIgniter\Model;

class ResponseModel extends Model
{
    protected $table            = 'tb_response';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['respondent_id','response_date','survey_result','quality'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllResponse()
    {
        return $this->select('tb_response.*, tb_respondent.name as respondent_name')
                    ->join('tb_respondent', 'tb_response.respondent_id = tb_respondent.id')
                    ->findAll();
    }
}
