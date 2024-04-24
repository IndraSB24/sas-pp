<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_doc_procurement extends Model
{
    protected $table      = 'project_detail_procurement';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_project', 'activity_code', 'description',
        'activity_code', 'description_of_work', 'mr_received_plan', 'mr_received_forecast', 
        'mr_received_actual', 'rfq_issued_plan', 'rfq_issued_forecast', 'rfq_issued_actual', 
        'quotation_received_plan', 'quotation_received_forecast', 'quotation_received_actual', 
        'technical_clarification_plan', 'technical_clarification_forecast', 'technical_clarification_actual', 
        'tbe_issued_plan', 'tbe_issued_forecast', 'tbe_issued_actual', 'cbe_issued_plan', 'cbe_issued_forecast', 
        'cbe_issued_actual', 'contract_date_plan', 'contract_date_forecast', 'contract_date_actual'
        
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'name'      => 'required|min_length[3]',
        'price'     => 'required|numeric',
    ];

    protected $validationMessages = [
        'name'        => [
            'required' => 'Bagian Name Harus diisi',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'price'        => [
            'required' => 'Bagian Price Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ]
    ];
    protected $skipValidation  = true;

    public function reset_increment()
    {
        $sql = "ALTER TABLE project_detail_procurement AUTO_INCREMENT=1";
        $this->db->query($sql);
    }
    
    // select all
    public function getAll(){
        //return $this->db->findAll();
    }
}
