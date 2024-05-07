<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_doc_procurement;
use App\Models\Model_doc_engineering;
use App\Models\Model_data_helper;

class Project_detail_procurement extends BaseController
{
    protected $Model_doc_procurement, $Model_project, $Model_doc_engineering, $Model_data_helper;
 
    function __construct(){
        $this->Model_doc_procurement = new Model_doc_procurement();
        $this->Model_project = new Model_project();
		$this->Model_doc_engineering = new Model_doc_engineering();
		$this->Model_data_helper = new Model_data_helper();
		helper(['session_helper', 'upload_path_helper', 'wa_helper']);
    }
    
	public function index($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Procurement Document']),
			'page_title' => view('partials/page-title', ['title' => 'Project Document', 'pagetitle' => 'Procurement']),
			'list_doc_procurement' => $this->Model_doc_engineeringt->findAll()
		];
		return view('procurement-document', $data);
	}
	
	public function show_doc_list($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Procurement Document List']),
			'page_title' => view('partials/page-title', ['title' => 'Procurement', 'pagetitle' => 'Document List']),
			'list_doc_procurement' => $this->Model_doc_procurement->getAll(),
			'data_weight' => $this->Model_data_helper->get_by_type('procurement_doc_weight')
		];
		// echo '<pre>'; print_r( $data );die; echo '</pre>';
		return view('document_procurement_detail', $data);
	}
	
	public function show_project_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Project List']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Project List'])
		];
		return view('project-list', $data);
	}
	
	public function show_document_list(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Document List']),
			'page_title' => view('partials/page-title', ['title' => 'Document', 'pagetitle' => 'Document List'])
		];
		return view('document-list', $data);
	}
	
	public function show_over_prog_month_detail(){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Progress by Month']),
			'page_title' => view('partials/page-title', ['title' => 'Project', 'pagetitle' => 'Progress by Month'])
		];
		return view('project-dashboard-overal-prog-month', $data);
	}

	public function add($kode=null){
	    switch($kode){
	        case 'doc_procurement':
	            $data = [
            		'level_code'    => $this->request->getPost('level_code'), 
            		'description'   => $this->request->getPost('description'),
            		'weight_factor' => $this->request->getPost('weight_factor'),
            		'plan_ifr'      => date_db_format($this->request->getPost('plan_ifr')),
            		'plan_ifa'      => date_db_format($this->request->getPost('plan_ifa')),
            		'plan_ifc'      => date_db_format($this->request->getPost('plan_ifc'))
            	];
            	$this->doc_procurement_model->reset_increment();
            	$this->doc_procurement_model->save($data);
	        break;
	    }
    }
    
    public function delete($id_project){
        $this->doc_procurement_model->delete($id_project);
        
    }
    
    public function update($kode=null, $id_update=null){
        switch($kode){
            case 'document_detail':
                $data = [
                    'level_code'    => $this->request->getPost('level_code_edit'),
                    'description'   => $this->request->getPost('description_edit'),
                    'weight_factor' => $this->request->getPost('weight_factor_edit'),
                    'plan_ifr'      => date_db_format($this->request->getPost('plan_ifr_edit')),
                    'plan_ifa'      => date_db_format($this->request->getPost('plan_ifa_edit')),
                    'plan_ifc'      => date_db_format($this->request->getPost('plan_ifc_edit'))
                ];
                $this->doc_procurement_model->update($id_update, $data);
            break;
            case 'actual_ifr_file':
                $data = [
                    'actual_ifr_file'   => $this->request->getPost('file'),
                    'actual_ifr'        => date_now(),
                ];
                $this->doc_procurement_model->update($id_update, $data);
            break;
            case 'actual_ifa_file':
                $data = [
                    'actual_ifa_file'   => $this->request->getPost('file'),
                    'actual_ifa'        => date_now(),
                ];
                $this->doc_procurement_model->update($id_update, $data);
            break;
            case 'actual_ifc_file':
                $data = [
                    'actual_ifc_file'   => $this->request->getPost('file'),
                    'actual_ifc'        => date_now(),
                ];
                $this->doc_procurement_model->update($id_update, $data);
            break;
        }
    }
    
    public function pagination(){
        
    }
}
