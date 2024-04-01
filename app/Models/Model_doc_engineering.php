<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_doc_engineering extends Model
{
    protected $table      = 'project_detail_engineering';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_project',
        'level_code',
        'description',
        'unit',
        'weight_factor',
        'plan_ifr', 'plan_ifa', 'plan_ifc',
        'actual_ifr', 'actual_ifa', 'actual_ifc',
        'file', 'file_version', 'file_status', 'file_comment'
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
        $sql = "ALTER TABLE project_detail_engineering AUTO_INCREMENT=1";
        $this->db->query($sql);
    }
    
    // select all
    public function get_by_id($id_doc){
        $query = $this->db
            ->where('id', $doc_id)
            ->get($table);
        
        return $query->result();
    }
}