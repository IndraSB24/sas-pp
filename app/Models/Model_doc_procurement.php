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
        'activity_code', 
        
        'activity_name_lvl_1', 'activity_name_lvl_2', 'activity_name_lvl_3', 'activity_name_lvl_4', 'detail_or_spesifikasi', 
        'quantity', 'unit', 'harga_satuan_material', 'total_harga_material', 'total_amount_material', 'harga_satuan_jasa', 
        'total_harga_jasa', 'total_amount_jasa', 'wf', 'po_plan', 'po_act', 'fat_plan', 'fat_act', 'rfs_plan', 'rfs_act', 
        'onsite_plan', 'onsite_act', 'install_plan', 'install_act', 'comm_plan', 'comm_act', 'id_group',
        'po_filename', 'po_status', 'po_id_file', 'activity_name_lvl_5',
        'fat_filename', 'fat_status', 'fat_id_file', 'rfs_filename', 'rfs_status', 'rfs_id_file',
        'onsite_filename', 'onsite_status', 'onsite_id_file', 'install_filename', 'install_status', 'install_id_file',
        'comm_filename', 'comm_status', 'comm_id_file'
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

    // get all man hour by dicipline per month
    public function getAll(){
        $this->select('
            project_detail_procurement.*,
            dh.name as group_name
        ')
        ->join('data_helper dh', 'dh.id=project_detail_procurement.id_group')
        ->where('project_detail_procurement.deleted_at', NULL);

        
        return $this->get()->getResult();
    }

    // get by id
    public function get_by_id($id_doc){
        $this->select('
            project_detail_procurement.*,
            dh.name as group_name
        ')
        ->join('data_helper dh', 'dh.id=project_detail_procurement.id_group')
        ->where('project_detail_procurement.id', $id_doc);
        
        return $this->get()->getResult();
    }

    // get cum plan percent progress till today
    public function getCumDataPlanPerToday($idProject = 1)
    {
        // Get the current date
        $currentDate = date('Y-m-d');

        $sql = "
            SELECT 
                SUM(
                    COALESCE(PO.counted_plan, 0) + 
                    COALESCE(FAT.counted_plan, 0) + 
                    COALESCE(RFS.counted_plan, 0) +
                    COALESCE(ONSITE.counted_plan, 0) + 
                    COALESCE(INSTALL.counted_plan, 0) + 
                    COALESCE(COMM.counted_plan, 0)
                ) AS cum_progress_plan
            FROM 
                data_week dw
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.10 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.po_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS PO ON dw.week_number = PO.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.10 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.fat_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS FAT ON dw.week_number = FAT.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.20 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.rfs_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS RFS ON dw.week_number = RFS.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.35 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.onsite_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS ONSITE ON dw.week_number = ONSITE.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.20 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.install_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS INSTALL ON dw.week_number = INSTALL.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.05 AS counted_plan
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.comm_plan BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS COMM ON dw.week_number = COMM.week_number
            WHERE
                dw.id_project = '$idProject'
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
                SUM(
                    COALESCE(PO.counted_actual, 0) + 
                    COALESCE(FAT.counted_actual, 0) + 
                    COALESCE(RFS.counted_actual, 0) +
                    COALESCE(ONSITE.counted_actual, 0) + 
                    COALESCE(INSTALL.counted_actual, 0) + 
                    COALESCE(COMM.counted_actual, 0)
                ) AS cum_progress_actual
            FROM 
                data_week dw
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.10 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.po_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS PO ON dw.week_number = PO.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.10 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.fat_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS FAT ON dw.week_number = FAT.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.20 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.rfs_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS RFS ON dw.week_number = RFS.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.35 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.onsite_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS ONSITE ON dw.week_number = ONSITE.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.20 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.install_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS INSTALL ON dw.week_number = INSTALL.week_number
            LEFT JOIN (
                SELECT 
                    dw.week_number AS week_number,
                    SUM(COALESCE(pdp.wf, 0)) * 0.05 AS counted_actual
                FROM 
                    data_week dw
                LEFT JOIN 
                    project_detail_procurement pdp ON (pdp.comm_actual BETWEEN dw.start_date AND dw.end_date)
                WHERE
                    dw.start_date <= '$currentDate' AND dw.id_project = '$idProject'
                GROUP BY
                    dw.week_number
            ) AS COMM ON dw.week_number = COMM.week_number
            WHERE
                dw.id_project = '$idProject'
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }
}
