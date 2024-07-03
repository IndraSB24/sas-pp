<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_construction extends Model
{
    protected $table      = 'construction';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'document_number', 'level_1', 'level_2', 'level_3', 'level_4', 'level_5', 'quantity',
        'unit', 'harga_satuan_material', 'harga_satuan_jasa', 'total_harga_material', 'total_harga_jasa',
        'total_amount', 'wf', 'baseline_schedule_start', 'baseline_schedule_finish', 'baseline_schedule_duration',
        'created_by'
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
        $sql = "ALTER TABLE project_list AUTO_INCREMENT=1";
        $this->db->query($sql);
    }
    
    // select all
    public function getAll(){
        //return $this->db->findAll();
    }
    
    // project list in home ------------------------------------------------------------------------------------------------------------------------------
    protected $columnSearch = ['contract_no']; // Add your searchable columns here
    protected $columnOrder  = [null, 'contract_no']; // Add your orderable columns here
    protected $order        = ['id' => 'asc']; // Default order
    private function _getDatatablesQuery()
    {
        $this->select('*')->from('project_list as pl');

        $i = 0;
        foreach ($this->columnSearch as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_POST['search']['value']);
                } else {
                    $this->orLike($item, $_POST['search']['value']);
                }

                if (count($this->columnSearch) - 1 == $i) {
                    $this->groupEnd();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $orderColumn = $this->columnOrder[$_POST['order'][0]['column']] ?? null;
            if (!empty($orderColumn)) {
                $this->orderBy($orderColumn, $_POST['order'][0]['dir']);
            }
        } else if (isset($this->order)) {
            $this->orderBy(key($this->order), $this->order[key($this->order)]);
        }
    }

    public function getDatatables()
    {
        $this->_getDatatablesQuery();
        if ($_POST['length'] != -1) {
            $this->limit($_POST['length'], $_POST['start']);
        }
        return $this->get()->getResult();
    }

    public function countFiltered()
    {
        $this->_getDatatablesQuery();
        return $this->countAllResults();
    }

    public function countAll()
    {
        return $this->countAll();
    }

    // get measurement basis
    public function getMeasurementBasis() {
        // Subquery to aggregate steps and sum actual_volume from construction_progress
        $progressSubquery = $this->db->table('construction_progress')
            ->select('
                id_construction,
                step,
                SUM(actual_volume) as total_inserted_volume
            ')
            ->groupBy('id_construction, step')
            ->getCompiledSelect();

        // Subquery to concatenate progress_name and progress_wf for each construction entry, limited to 6 steps
        $measurementSubquery = $this->db->table('construction_measurement_basis cmb')
            ->select('
                cmb.id_construction, 
                GROUP_CONCAT(CONCAT(cmb.progress_name, ":", cmb.progress_wf) ORDER BY cmb.progress_step ASC SEPARATOR ",") as cmb_array,
                cp.step,
                cp.total_inserted_volume
            ')
            ->join("($progressSubquery) as cp", 'cp.id_construction = cmb.id_construction', 'LEFT')
            ->groupBy('cmb.id_construction, cp.step')
            ->having('COUNT(*) <= 6')
            ->getCompiledSelect();
    
        // Main query to select the necessary fields and join with the subquery
        $this->select('
            construction.id as id_construction,
            construction.document_number as document_number,
            construction.level_5 as description,
            construction.wf as wf,
            subquery.cmb_array as cmb_array
        ')
        ->join("($measurementSubquery) as subquery", 'subquery.id_construction = construction.id', 'LEFT')
        ->where('construction.deleted_at', NULL);
    
        $results = $this->get()->getResult();
    
        // Process results to transform cmb_array into separate step fields
        foreach ($results as &$result) {
            // Initialize step fields with null values
            for ($i = 1; $i <= 6; $i++) {
                $result->{"step_{$i}_name"} = null;
                $result->{"step_{$i}_wf"} = null;
            }
        
            // Check if cmb_array is set and not empty
            if (!empty($result->cmb_array)) {
                // Split cmb_array into individual steps and wfs
                $cmb_array = explode(',', $result->cmb_array);
                foreach ($cmb_array as $index => $step_info) {
                    if ($index < 6) {
                        // Split the step_info into progress name and progress wf
                        $info_parts = explode(':', $step_info);
        
                        // Check if there are exactly two parts (progress name and progress wf)
                        if (count($info_parts) === 2) {
                            // Assign progress name and progress wf to respective step fields
                            $result->{"step_" . ($index + 1) . "_name"} = $info_parts[0];
                            $result->{"step_" . ($index + 1) . "_wf"} = $info_parts[1];
                        } else {
                            // Handle cases where the split does not produce two parts (error handling if needed)
                            // For now, just set them to null
                            $result->{"step_" . ($index + 1) . "_name"} = null;
                            $result->{"step_" . ($index + 1) . "_wf"} = null;
                        }
                    }
                }
            } else {
                // Handle case where cmb_array is empty or null
                // For now, just continue with null values for step fields
                continue;
            }
        }
        
    
        return $results;
    }

    // get measurement basis
    public function getConstructionList() {
        // Subquery to aggregate steps and sum actual_volume from construction_progress
        $progressSubquery = $this->db->table('construction_progress')
            ->select('
                id_construction,
                step,
                SUM(actual_volume) as total_inserted_volume
            ')
            ->groupBy('id_construction, step')
            ->getCompiledSelect();

        // Subquery to concatenate progress_name and progress_wf for each construction entry, limited to 6 steps
        $measurementSubquery = $this->db->table('construction_measurement_basis cmb')
            ->select('
                cmb.id_construction, 
                GROUP_CONCAT(CONCAT(cmb.progress_name, ":", cmb.progress_wf, ":", IFNULL(cp.total_inserted_volume, 0)) ORDER BY cmb.progress_step ASC SEPARATOR ",") as cmb_array
            ')
            ->join("($progressSubquery) as cp", 'cp.id_construction = cmb.id_construction AND cp.step = cmb.progress_step', 'LEFT')
            ->groupBy('cmb.id_construction')
            ->having('COUNT(*) <= 6')
            ->getCompiledSelect();

        // Main query to select the necessary fields and join with the subquery
        $this->select('
            construction.*,
            subquery.cmb_array as cmb_array
        ')
        ->join("($measurementSubquery) as subquery", 'subquery.id_construction = construction.id', 'LEFT')
        ->where('construction.deleted_at', NULL);

        $results = $this->get()->getResult();

        // Process results to transform cmb_array into separate step fields
        foreach ($results as &$result) {
            // Initialize step fields with null values
            for ($i = 1; $i <= 6; $i++) {
                $result->{"step_{$i}_name"} = null;
                $result->{"step_{$i}_wf"} = null;
                $result->{"step_{$i}_actual_volume"} = null;
            }
            
            // Check if cmb_array is set and not empty
            if (!empty($result->cmb_array)) {
                // Split cmb_array into individual steps and wfs
                $cmb_array = explode(',', $result->cmb_array);
                foreach ($cmb_array as $index => $step_info) {
                    if ($index < 6) {
                        // Split the step_info into progress name, progress wf, and actual volume
                        $info_parts = explode(':', $step_info);
                        // Check if there are exactly three parts (progress name, progress wf, and actual volume)
                        if (count($info_parts) === 3) {
                            // Assign progress name, progress wf, and actual volume to respective step fields
                            $result->{"step_" . ($index + 1) . "_name"} = $info_parts[0];
                            $result->{"step_" . ($index + 1) . "_wf"} = $info_parts[1];
                            $result->{"step_" . ($index + 1) . "_actual_volume"} = $info_parts[2];
                        }
                    }
                }
            }
        }
    
        return $results;
    }
    
}
