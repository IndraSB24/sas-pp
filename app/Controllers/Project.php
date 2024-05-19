<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_doc_engineering;
use App\Models\Model_engineering_doc_comment;
use App\Models\Model_engineering_doc_file;
use App\Models\Model_data_helper;
use App\Models\Model_week;

class Project extends BaseController
{
    protected $main_model, $Model_doc_engineering, $Model_engineering_doc_comment, $Model_engineering_doc_file,
		$Model_data_helper, $Model_week;
 
    function __construct(){
        $this->main_model = new Model_project();
		$this->Model_doc_engineering = new Model_doc_engineering();
		$this->Model_engineering_doc_comment = new Model_engineering_doc_comment();
		$this->Model_engineering_doc_file = new Model_engineering_doc_file();
		$this->Model_data_helper = new Model_data_helper();
        $this->Model_week = new Model_week();
		helper(['session_helper', 'upload_path_helper']);
    }
    
	public function index($project_detail=""){
		$data_page = (object)[
			'overal_plan' => 75,
			'overal_actual' => 60,
			'overal_variance' => 15,
			'chart_pt_engineering_plan' => 50,
			'chart_pt_engineering_actual' => 30,
			'chart_pt_procurement_plan' => 70,
			'chart_pt_procurement_actual' => 15,
		];

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Project Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Project Dashboard '.$project_detail, 'subtitle' => 'TBBM BIAK']),
			'data_page' => $data_page,
			// 'progressChartDataEngineering' => [
            //     'percent_plan' => $this->Model_doc_engineering->getCumDataPlanPerToday(),
            //     'percent_actual' => $this->Model_doc_engineering->getCumDataActualPerToday()
            // ],
			'progressChartDataEngineering' => [
				'percent_plan' => [(object) ['cum_progress_plan' => 12.345]],
				'percent_actual' => [(object) ['cum_progress_actual' => 67.8910]]
			]
		];
		// return view('project-dashboard', $data);
		return view('project-dashboard-v2', $data);
	}
	
	public function show_project_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Project List']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Project List'])
		];
		return view('project-list', $data);
	}
	
	public function show_document_list($kode=null){
	    switch($kode){
	        case "engineering":
	            $data = [
        			'title_meta' => view('partials/title-meta', ['title' => 'Engineering Document']),
        			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Engineering Document'])
        		];
        		return view('engineering-document', $data);
	        break;
	        case "procurement":
	            $data = [
        			'title_meta' => view('partials/title-meta', ['title' => 'Procurement Document']),
        			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Procurement Document'])
        		];
        		return view('procurement-document', $data);
	        break;
	    }
		
	}
	
	public function show_over_prog_month_detail(){
		// start of scurve data count engineering ===============================================
        $getScurveDataPlan = $this->Model_doc_engineering->getScurveDataPlan();
        $getScurveDataActual = $this->Model_doc_engineering->getScurveDataActual();

        // count plan cum
        $getScurveDataPlanCum = [];
        $plan_cum_counted = 0;
        foreach ($getScurveDataPlan as $key => $value) {
            $plan_cum_counted += $value->cum_plan_wf;
            $getScurveDataPlanCum[$key] = $plan_cum_counted;
        }

        // count act cum
        $getScurveDataActualCum = [];
        $actual_cum_counted = 0;
        foreach ($getScurveDataActual as $key => $value) {
            $actual_cum_counted += $value->cum_actual_wf;
            $getScurveDataActualCum[$key] = $actual_cum_counted;
        }
        // end of scurve data ===================================================================
		
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Progress by Week']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Progress by Week']),
			'subtitle' => 'Judul Project',
            'dataWeek' => $this->Model_week->findAll(),
            'scurveDataEngineering' => [
                'dataPlan' => $getScurveDataPlan,
                'dataActual' => $getScurveDataActual,
                'dataPlanCum' => $getScurveDataPlanCum,
                'dataActualCum' => $getScurveDataActualCum
            ]
		];
		return view('project-dashboard-overal-prog-month', $data);
	}

	public function add(){
    	$data = [
    		'contract_no'   => $this->request->getPost('contract_no'), 
    		'award_date'    => date_db_format($this->request->getPost('award_date')),
    		'manager'       => $this->request->getPost('project_manager'),
    		'value'         => $this->request->getPost('project_value'),
    		'progress'      => '50',
    		'created_by'    => 'okokok'
    	];
    	$this->main_model->reset_increment();
    	$this->main_model->save($data);
    }
    
    public function delete($id_project){
        $this->main_model->delete($id_project);
    }
    
    public function pagination(){
        
    }
}
