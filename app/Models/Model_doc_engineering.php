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
        'id_project', 'level_code', 'description', 'unit', 'weight_factor',
        'plan_ifr', 'plan_ifa', 'plan_ifc',
        'actual_ifr', 'actual_ifa', 'actual_ifc',
        'file', 'file_version', 'file_status', 'file_comment',
        'internal_engineering_status', 'internal_ho_status', 'internal_pem_status', 'internal_originator_status',
        'internal_engineering_date', 'internal_ho_date', 'internal_pem_date', 'internal_originator_date', 
        'id_engineering_doc_file', 'wbs_code', 'actual_ifr_status', 'actual_ifa_status', 'actual_ifc_status',
        'external_asbuild_plan', 'external_asbuild_actual', 'external_asbuild_status', 'id_doc_dicipline', 
        'man_hour_plan', 'man_hour_actual'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function reset_increment()
    {
        $sql = "ALTER TABLE project_detail_engineering AUTO_INCREMENT=1";
        $this->db->query($sql);
    }
    
    // select all
    public function get_by_id($id_doc){
        $this->select('
            *
        ')
        ->where('id', $id_doc);
        
        return $this->get()->getResult();
    }

    // count all doc
    public function count_all_doc(){
        $this->select('
            *
        ')
        ->where('deleted_at', null);
        
        $result = $this->get()->getResult();
        $count = count($result);
        
        return $count;
    }

    // get sum actual weight factor
    public function get_weight_factor(){
        $this->select('
            weight_factor
        ')
        ->where('file_status', 'ifc_approve');
        
        return $this->get()->getResult();
    }

    // get with comment
    public function get_with_comment($id){
        $this->select('
            project_detail_engineering.*,
            c.comment_file as comment_file,
            c.page_detail as page_detail
        ')
        ->join('engineering_doc_comment c', 'c.id_doc=project_detail_engineering.id', 'LEFT')
        ->where('project_detail_engineering.id', $id);
        
        return $this->get()->getResult();
    }

    // Update all fields based on the provided data
    public function updateAllFields($id, $data)
    {
        return $this->update($id, $data);
    }

    // regex search
    public function get_filename_by_doc_id($id_doc)
    {
        $this->select('
            file
        ')
        ->where('id', $id_doc);
        
        return $this->get()->getResult();
    }

}
