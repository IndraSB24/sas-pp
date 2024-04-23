<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_doc_engineering;
use App\Models\Model_engineering_doc_comment;
use App\Models\Model_engineering_doc_file;

class Project extends BaseController
{
    protected $main_model, $Model_doc_engineering, $Model_engineering_doc_comment, $Model_engineering_doc_file;
 
    function __construct(){
        $this->main_model = new Model_project();
		$this->Model_doc_engineering = new Model_doc_engineering();
		$this->Model_engineering_doc_comment = new Model_engineering_doc_comment();
		$this->Model_engineering_doc_file = new Model_engineering_doc_file();
		helper(['session_helper', 'upload_path_helper']);
    }
    
	public function index($project_detail=""){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Project Dashboard']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Project Dashboard '.$project_detail])
		];
		return view('project-dashboard', $data);
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
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Progress by Month']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Progress by Month'])
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
