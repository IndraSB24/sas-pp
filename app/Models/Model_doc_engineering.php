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
        ->where('deleted_at', NULL)
        ->where('file_status', 'asbuild_approve');
        
        return $this->get()->getResult();
    }

    // get sum plan weight factor
    public function get_plan_weight_factor(){
        $result = $this->select('
            YEAR(external_asbuild_plan) as year,
            MONTH(external_asbuild_plan) as month,
            SUM(weight_factor) as weight_factor_sum
        ')
        ->where('deleted_at', null)
        ->groupBy('YEAR(external_asbuild_plan), MONTH(external_asbuild_plan)')
        ->get()
        ->getResult();
    
        return $result;
    }
    

    // get plan range
    public function get_plan_range(){
        $result = $this->select('
            min(external_asbuild_plan) as min_date_range,
            max(external_asbuild_plan) as max_date_range
        ')
        ->where('deleted_at', null)
        ->get()
        ->getResult();
    
        // Format dates as ISO 8601 (YYYY-MM-DD)
        $formattedResult = array_map(function($item) {
            $item->min_date_range = date('Y-m-d', strtotime($item->min_date_range));
            $item->max_date_range = date('Y-m-d', strtotime($item->max_date_range));
            return $item;
        }, $result);
    
        return $formattedResult;
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

    // get all
    public function get_all(){
        $this->select('
            project_detail_engineering.*,
            dh.name as doc_dicipline
        ')
        ->join('data_helper dh', 'dh.id=project_detail_engineering.id_doc_dicipline', 'LEFT')
        ->where('project_detail_engineering.deleted_at', NULL);
        
        return $this->get()->getResult();
    }

    // get all man hour by dicipline
    public function getManHourPerDicipline(){
        $this->select('
            IFNULL(SUM(project_detail_engineering.man_hour_plan), 0) AS man_hour_plan,
            IFNULL(SUM(project_detail_engineering.man_hour_actual), 0) AS man_hour_actual,
            dh.name as dicipline_name
        ')
        ->join('data_helper dh', 'dh.id=project_detail_engineering.id_doc_dicipline')
        ->where('project_detail_engineering.deleted_at', NULL)
        ->groupBy('dh.id');
        
        return $this->get()->getResult();
    }

    // get all man hour by dicipline per month
    public function getManHourByDiciplinePerMonth(){
        $this->select('
            YEAR(project_detail_engineering.external_asbuild_plan) as asbuild_plan_year,
            MONTH(project_detail_engineering.external_asbuild_plan) as asbuild_plan_month,
            dh.name as dicipline_name,
            SUM(project_detail_engineering.man_hour_plan) AS man_hour_plan,
            SUM(project_detail_engineering.man_hour_actual) AS man_hour_actual
        ')
        ->join('data_helper dh', 'dh.id=project_detail_engineering.id_doc_dicipline')
        ->where('project_detail_engineering.deleted_at', NULL)
        ->groupBy('asbuild_plan_year, asbuild_plan_month, dicipline_name');
 
        return $this->get()->getResult();
    }

    // get scurve dashboard mdr
    public function getScurveDashboardMDR(){
        $this->select('
            WEEK(project_detail_engineering.external_asbuild_plan) as weeks,
            MONTH(project_detail_engineering.external_asbuild_plan) as asbuild_plan_month,
            dh.name as dicipline_name,
            SUM(project_detail_engineering.man_hour_plan) AS man_hour_plan,
            SUM(project_detail_engineering.man_hour_actual) AS man_hour_actual
        ')
        ->join('data_helper dh', 'dh.id=project_detail_engineering.id_doc_dicipline')
        ->where('project_detail_engineering.deleted_at', NULL)
        ->groupBy('asbuild_plan_year, asbuild_plan_month, dicipline_name');
 
        return $this->get()->getResult();
    }

    // get scurve chart data plan
    public function getScurveDataPlan($idProject = 1)
    {
        $sql = "
            SELECT 
                dw.week_number AS week_number,
                COALESCE(SUM(COALESCE(pde1.weight_factor, 0) * 0.25) +
                    SUM(COALESCE(pde2.weight_factor, 0) * 0.65) +
                    SUM(COALESCE(pde3.weight_factor, 0) * 0.10), 0)/100 AS cum_plan_wf
            FROM 
                data_week dw
            LEFT JOIN 
                project_detail_engineering pde1 ON (pde1.plan_ifa BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde2 ON (pde2.plan_ifc BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde3 ON (pde3.external_asbuild_plan BETWEEN dw.start_date AND dw.end_date)
            WHERE
                dw.id_project = '$idProject'
            GROUP BY 
                dw.id
            ORDER BY 
                dw.id
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // get scurve chart data actual
    public function getScurveDataActual($idProject = 1)
    {
        $sql = "
            SELECT 
                dw.week_number AS week_number,
                COALESCE(SUM(COALESCE(pde1.weight_factor, 0) * 0.25) +
                    SUM(COALESCE(pde2.weight_factor, 0) * 0.65) +
                    SUM(COALESCE(pde3.weight_factor, 0) * 0.10), 0) AS cum_actual_wf
            FROM 
                data_week dw
            LEFT JOIN 
                project_detail_engineering pde1 ON (pde1.actual_ifa BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde2 ON (pde2.actual_ifc BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde3 ON (pde3.external_asbuild_actual BETWEEN dw.start_date AND dw.end_date)
            WHERE
                dw.id_project = '$idProject'
            GROUP BY 
                dw.id
            ORDER BY 
                dw.id
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // get cum plan percent progress till today
    public function getCumDataPlanPerToday($idProject = 1)
    {
        // Get the current date
        $currentDate = date('Y-m-d');

        $sql = "
            SELECT 
                COALESCE(SUM(COALESCE(pde1.weight_factor, 0) * 0.25) +
                    SUM(COALESCE(pde2.weight_factor, 0) * 0.65) +
                    SUM(COALESCE(pde3.weight_factor, 0) * 0.10), 0) / 100 AS cum_progress_plan
            FROM 
                data_week dw
            LEFT JOIN 
                project_detail_engineering pde1 ON (pde1.plan_ifa BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde2 ON (pde2.plan_ifc BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde3 ON (pde3.external_asbuild_plan BETWEEN dw.start_date AND dw.end_date)
            WHERE 
                dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // get cum actual percent progress till today
    public function getCumDataActualPerToday($idProject = 1)
    {
        // Get the current date
        $currentDate = date('Y-m-d');

        $sql = "
            SELECT 
                COALESCE(SUM(COALESCE(pde1.weight_factor, 0) * 0.25) +
                    SUM(COALESCE(pde2.weight_factor, 0) * 0.65) +
                    SUM(COALESCE(pde3.weight_factor, 0) * 0.10), 0) AS cum_progress_actual
            FROM 
                data_week dw
            LEFT JOIN 
                project_detail_engineering pde1 ON (pde1.actual_ifa BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde2 ON (pde2.actual_ifc BETWEEN dw.start_date AND dw.end_date)
            LEFT JOIN
                project_detail_engineering pde3 ON (pde3.external_asbuild_actual BETWEEN dw.start_date AND dw.end_date)
            WHERE 
                dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }


}
