<?php

namespace App\Controllers;
use CodeIgniter\CLI\Console;
use App\Models\Model_project;
use App\Models\Model_doc_engineering;
use App\Models\Model_timeline_doc;
use App\Models\Model_engineering_doc_comment;
use App\Models\Model_engineering_doc_file;

class Project_detail_engineering extends BaseController
{
    protected $doc_engineering_model, $project_model, $timeline_doc_model, $Model_engineering_doc_comment,
        $Model_engineering_doc_file;
 
    function __construct(){
        $this->doc_engineering_model = new Model_doc_engineering();
        $this->project_model = new Model_project();
        $this->timeline_doc_model = new Model_timeline_doc();
        $this->Model_engineering_doc_comment = new Model_engineering_doc_comment();
        $this->Model_engineering_doc_file = new Model_engineering_doc_file();
        helper(['session_helper', 'upload_path_helper', 'wa_helper']);
    }
    
	public function index($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Engineering Document']),
			'page_title' => view('partials/page-title', ['title' => 'Project Document', 'pagetitle' => 'MDR']),
			'list_doc_engineering' => $this->doc_engineering_model->findAll(),
            'data_weight_factor' => $this->doc_engineering_model->get_weight_factor(),
            'total_doc' => $this->doc_engineering_model->count_all_doc()
		];

		return view('engineering-document', $data);
	}
	
	public function show_doc_list($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Engineering Document List']),
			'page_title' => view('partials/page-title', ['title' => 'Engineering', 'pagetitle' => 'Document List']),
			'list_doc_engineering' => $this->doc_engineering_model->findAll()
		];
        // echo '<pre>'; print_r( $data );die; echo '</pre>';
		return view('document_engineering_detail', $data);
		// return view('document_engineering_detail_external', $data);
		// return view('document_engineering_detail_internal', $data);
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

    public function show_pdf($doc_id, $step) {
		$data = [   
			'title_meta' => view('partials/title-meta', ['title' => 'Comment PDF']),
			'page_title' => view('partials/page-title', ['title' => 'Document', 'pagetitle' => 'Comment PDF']),
            'doc_id' => $doc_id,
            'file_name' => 'test.pdf',
            'doc_data' => $this->doc_engineering_model->get_by_id($doc_id),
            'step' => $step
		];
        // print_r($data['doc_data']);die;
		return view('test_view', $data);
    }
	
	public function show_doc_timeline($doc_id){
	    $all_timeline_data = $this->timeline_doc_model
	        ->where('doc_id', $doc_id)
	        ->findALl();
	   // $all_timeline_data = $this->timeline_doc_model->findAll();
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Document Timeline']),
			'page_title' => view('partials/page-title', ['title' => 'Document', 'pagetitle' => 'Timeline Document']),
			'timeline_data' => array_reverse($all_timeline_data)
		];
		return view('timeline-document', $data);
	}
	
    // Show ==============================================================================================================
	public function show(request $param){
        switch($param->kode){
            case 'document_timeline':
                $title = $param;
                $data = [
        			'title_meta' => view('partials/title-meta', ['title' => $param->title.' Timeline']),
        			'page_title' => view('partials/page-title', ['title' => 'Timeline', 'pagetitle' => $param->title]),
        			'passed_data' => $this->doc_engineering_model->find()
        		];
        		return view('timeline-document', $data);
            break;
            case 'actual_ifr_file':
                $data = [
                    'actual_ifr_file'   => $this->request->getPost('file'),
                    'actual_ifr'        => date_now(),
                ];
                $this->doc_engineering_model->update($id_update, $data);
            break;
            case 'actual_ifa_file':
                $data = [
                    'actual_ifa_file'   => $this->request->getPost('file'),
                    'actual_ifa'        => date_now(),
                ];
                $this->doc_engineering_model->update($id_update, $data);
            break;
            case 'actual_ifc_file':
                $data = [
                    'actual_ifc_file'   => $this->request->getPost('file'),
                    'actual_ifc'        => date_now(),
                ];
                $this->doc_engineering_model->update($id_update, $data);
            break;
        }
    }

	public function add($kode=null){
	    switch($kode){
	        case 'doc_engineering':
	            $data = [
            		'level_code'    => $this->request->getPost('level_code'), 
            		'description'   => $this->request->getPost('description'),
            		'weight_factor' => $this->request->getPost('weight_factor'),
            		'plan_ifa'      => date_db_format($this->request->getPost('plan_ifa')),
            		'plan_ifc'      => date_db_format($this->request->getPost('plan_ifc')),
            		'external_asbuild_plan'      => date_db_format($this->request->getPost('external_asbuild_plan')),
                    'man_hour_plan' => $this->request->getPost('man_hour_plan'),
                    'id_doc_dicipline' => $this->request->getPost('id_doc_dicipline'),
            	];
            	$this->doc_engineering_model->reset_increment();
            	$this->doc_engineering_model->save($data);
	        break;
	    }
    }
    
    public function delete($id_project){
        $this->doc_engineering_model->delete($id_project); 
    }

    // edit document =============================================================
    public function edit_document(){
        $data = array_intersect_key(
            $this->request->getPost(),
            array_flip([
                'level_code', 'description', 'weight_factor', 'man_hour_plan', 'id_doc_dicipline'
            ])
        );
        $data['id'] = $this->request->getPost('id_edit');
        $data['created_by'] = sess('active_user_id');

        $plan_ifa = $this->request->getPost('plan_ifa');
        $data['plan_ifa'] = $plan_ifa ? date('Y-m-d H:i:s', strtotime($plan_ifa)) : null;

        $plan_ifc = $this->request->getPost('plan_ifc');
        $data['plan_ifc'] = $plan_ifc ? date('Y-m-d H:i:s', strtotime($plan_ifc)) : null;

        $plan_asbuild = $this->request->getPost('external_asbuild_plan');
        $data['external_asbuild_plan'] = $plan_asbuild ? date('Y-m-d H:i:s', strtotime($plan_asbuild)) : null;
        // echo '<pre>'; print_r( $data );die; echo '</pre>';
        $updateData = $this->doc_engineering_model->save($data);
        
        if ($updateData) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false];
        }
        return $this->response->setJSON($response);
    }

    // upload originator
    public function up_originator(){
        // read the file
        $uploaded_file = $this->request->getFile('file');
                
        // store the file
        if($uploaded_file){
            $store_file = $uploaded_file->move('upload/engineering_doc/list');
            
            $id_doc = $this->request->getPost('id_doc');
            $version= $this->request->getPost('version');
            $doc_name= $this->request->getPost('doc_name');
            $doc_code= $this->request->getPost('doc_code');

            // safe file to engineering doc file
            $data = [
                'id_doc' => $id_doc,
                'filename' => $uploaded_file->getName(),
                'version' => $version,
                'created_by' => sess('active_user_id')
            ];
            $returned_id = $this->Model_engineering_doc_file->insertWithReturnId($data);
            
            // save file name to database
            $data = [
                'id' => $id_doc,
                'file' => $uploaded_file->getName(),
                'internal_originator_status' => 'uploaded',
                'internal_originator_date' => date('Y-m-d H:i:s'),
                'id_engineering_doc_file' => $returned_id,
                'file_status' => 'originator_upload',
                'internal_engineering_status' => 'progress',
                'internal_engineering_date' => '',
                'internal_ho_status' => '',
                'internal_ho_date' => null,
                'internal_pem_status' => '',
                'internal_pem_date' => null,
                'actual_ifr' => null,
                'actual_ifr_status' => '',
                'actual_ifa' => null,
                'actual_ifa_status' => '',
                'actual_ifc' => null,
                'actual_ifc_status' => ''
            ];
            $update_doc = $this->doc_engineering_model->save($data);
            
            $data_timeline = [
                'doc_id'                => $id_doc,
                'detail_type'           => 'internal_engineering',
                'time'                  => date('Y-m-d H:i:s'),
                'timeline_title'        => 'internal originator file upload',
                'timeline_description'  => 'new file upload',
                'timeline_status'       => 'on time',
                'new_file'              => $data['file'],
                'file_status'           => 'internal',
                'created_by'            => sess('active_user_id')
            ];
            $this->timeline_doc_model->save($data_timeline);

            $nope_sandhi = "6287888276877";
            $nope_indra = "6285274897212";
            $data_wa = [
                'penerima' => $nope_indra,
                'doc_name' => $doc_name,
                'doc_code' => $doc_code,
                'tgl_upload' => date('Y-m-d H:i:s'),
                'link_to_open' => "https://sasinfinity.com/inpormasi/public/commentPdf/".$id_doc."/internal"
            ];
            originatorToInternalEngineering($data_wa);

            // return and notif wa
            if ($store_file && $returned_id && $update_doc){
                $response = [
                    'success' => true,
                    'message' => 'File Uploaded successfully.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to Upload File.'
                ];
            }
   
        }else {
            $response = [
                'success' => false,
                'message' => 'No file specified.'
            ];
        }

        return json_encode($response);
    }

    // approve internal engineerin
    public function approve_internal_engineering(){
        $id_doc = $this->request->getPost('id_doc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'internal_engineering_approve',
            'internal_engineering_status' => 'approve',
            'internal_engineering_date' => date('Y-m-d H:i:s'),
            'internal_ho_status' => 'progress',
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_engineering',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal engineering review file approve',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'on time',
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject internal engineerin
    public function reject_internal_engineering(){
        $id_doc = $this->request->getPost('id_doc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'reject',
            'internal_originator_status' => 'progress',
            'internal_engineering_status' => 'reject',
            'internal_engineering_date' => date('Y-m-d H:i:s')
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_engineering',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal review file reject',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'on time',
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // approve internal ho
    public function approve_internal_ho(){
        $id_doc = $this->request->getPost('id_doc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'internal_ho_approve',
            'internal_ho_status' => 'approve',
            'internal_ho_date' => date('Y-m-d H:i:s'),
            'internal_pem_status' => 'progress',
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_ho',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal HO endorse the document',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'on time',
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject internal ho
    public function reject_internal_ho(){
        $id_doc = $this->request->getPost('id_doc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'reject',
            'internal_originator_status' => 'progress',
            'internal_ho_status' => 'reject',
            'internal_ho_date' => date('Y-m-d H:i:s')
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_ho',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal HO file reject',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'on time',
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File rejected successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to reject File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // approve internal pem with automation up IFR
    public function approve_internal_pem(){
        $id_doc = $this->request->getPost('id_doc');
        $version= $this->request->getPost('version');
        $plan_date = $this->request->getPost('plan_ifa');

        if($version != null || $version != ""){
            $version = autoVersioning($version, 'issued');
        }else{
            $version = "0A";
        }
        
        $data = [
            'id' => $id_doc,
            'file_version' => $version,
            'file_status' => 'internal_pem_approve',
            'internal_pem_status' => 'approve',
            'internal_pem_date' => date('Y-m-d H:i:s'),
            'actual_ifr' => date('Y-m-d H:i:s'),
            'actual_ifr_status' => 'uploaded',
            'actual_ifa_status' => 'progress'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        // timeline for internal pem approve
        $data_timeline_pem = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_pem',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal PEM approve the document',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline_pem);

        // timeline for external IFR issued
        $data_timeline_ifr = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document issued for review (IFR)',
            'timeline_description'  => 'document version '.$version,
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_ifr',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline_ifr);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject internal pem
    public function reject_internal_pem(){
        $id_doc = $this->request->getPost('id_doc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'reject',
            'internal_originator_status' => 'progress',
            'internal_pem_status' => 'reject',
            'internal_pem_date' => date('Y-m-d H:i:s')
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'internal_ho',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'internal PEM file reject',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'on time',
            'new_file'              => '',
            'file_status'           => 'internal',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File rejected successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to reject File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // approve external ifa
    public function approve_external_ifa(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('plan_ifa');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'external_ifa_approve',
            'actual_ifa' => date('Y-m-d H:i:s'),
            'actual_ifa_status' => 'approve',
            'actual_ifc_status' => 'progress'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        // timeline for internal pem approve
        $data_timeline_pem = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external_ifa',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document approved in IFA step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline_pem);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject external ifa
    public function reject_external_ifa(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('plan_ifa');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'ifa_reject',
            'internal_originator_status' => 'progress',
            'actual_ifr' => null,
            'actual_ifr_status' => null,
            'actual_ifa' => date('Y-m-d H:i:s'),
            'actual_ifa_status' => 'reject'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document rejected in IFA step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_ifa_reject',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File rejected successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to reject File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // approve external ifc
    public function approve_external_ifc(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('plan_ifc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'ifc_approve',
            'actual_ifc' => date('Y-m-d H:i:s'),
            'actual_ifc_status' => 'approve'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        // timeline for internal pem approve
        $data_timeline_pem = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document approved in IFC step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_ifc_approve',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline_pem);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject external ifc
    public function reject_external_ifc(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('plan_ifc');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'ifc_reject',
            'internal_originator_status' => 'progress',
            'actual_ifr' => null,
            'actual_ifr_status' => null,
            'actual_ifc' => date('Y-m-d H:i:s'),
            'actual_ifc_status' => 'reject'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document rejected in IFC step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_ifc_reject',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File rejected successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to reject File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // approve external asbuild
    public function approve_external_asbuild(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('external_asbuild_plan');
        
        $data = [
            'id' => $id_doc,
            'file_version' => autoVersioning($version, 'approve'),
            'file_status' => 'asbuild_approve',
            'external_asbuild_actual' => date('Y-m-d H:i:s'),
            'external_asbuild_status' => 'approve'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        // timeline for internal pem approve
        $data_timeline_pem = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document approved in Asbuild step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_asbuild_approve',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline_pem);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File approved successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to approve File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // reject external asbuild
    public function reject_external_asbuild(){
        $id_doc = $this->request->getPost('id_doc');
        $plan_date = $this->request->getPost('external_asbuild_plan');
        
        $data = [
            'id' => $id_doc,
            'file_status' => 'external_asbuild_reject',
            'internal_originator_status' => 'progress',
            'actual_ifr' => null,
            'actual_ifr_status' => null,
            'external_asbuild_actual' => date('Y-m-d H:i:s'),
            'external_asbuild_status' => 'reject'
        ];
        $update_doc = $this->doc_engineering_model->save($data);

        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'external',
            'time'                  => date('Y-m-d H:i:s'),
            'timeline_title'        => 'document rejected in Asbuild step',
            'timeline_description'  => 'no desc',
            'timeline_status'       => $this->timeStatusCheck($plan_date),
            'new_file'              => '',
            'file_status'           => 'external_asbuild_reject',
            'created_by'            => sess('active_user_id')
        ];
        $this->timeline_doc_model->save($data_timeline);

        if ($update_doc) {
            $response = [
                'success' => true,
                'message' => 'File rejected successfully.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to reject File.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // add comment
    public function add_comment(){
        $uploaded_file = $this->request->getFile('image');
        // store the file
        if($uploaded_file){
            $uploaded_file->move('upload/engineering_doc/comment');
            
            // save file name to database
            $data_add = [
                'doc_id' => $this->request->getPost('id_doc'),
                'id_engineering_doc_file' => $this->request->getPost('id_file'),
                'comment_title' => $this->request->getPost('comment_title'),
                'comment_file' => $uploaded_file->getName(),
                'page_detail' => $this->request->getPost('page_detail'),
                'created_by' => sess('active_user_id')
            ];
            $save_file = $this->Model_engineering_doc_comment->save($data_add);
            
            $data_timeline = [
                'doc_id'                => $data_add['doc_id'],
                'detail_type'           => 'engineering',
                'time'                  => date_now(),
                'timeline_title'        => 'Engineering Comment',
                'timeline_description'  => 'no desc',
                'timeline_status'       => 'late',
                'new_file'              => path_engineering_doc_comment($uploaded_file->getName()),
                'file_status'           => '',
                'created_by'            => sess('active_user_id')
            ];
            $this->timeline_doc_model->save($data_timeline);

            if ($save_file) {
                $response = [
                    'success' => true,
                    'message' => 'Comment added successfully.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to add comment.'
                ];
            }
        }
        else {
            $response = [
                'success' => false,
                'message' => 'No file specified.'
            ];
        }

        return $this->response->setJSON($response);
    }

    // list comment
    public function ajax_get_comment($id_doc, $id_approver=null){
        // $id_doc = $this->request->getPost('id_doc');
        // $id_approver = $this->request->getPost('id_approver') ?: null;
    
        $payload = [
            'id_doc' => $id_doc,
            'id_approver' => $id_approver
        ];
        $fetched_data = $this->Model_engineering_doc_comment->get_by_idDoc_idApprover($payload);
        // Check if comments are fetched successfully
        if ($fetched_data) {
            // Return the fetched comments in JSON format
            return json_encode($fetched_data);
        } else {
            $response = [
                'success' => false,
                'message' => 'No Data.'
            ];
            
            return $this->response->setJSON($response);
        }
    }
    
    // time status checker
    function timeStatusCheck($plan_date) {
        $current_datetime = date('Y-m-d H:i:s');
    
        $status = $plan_date > $current_datetime ? "late" : "on time";
    
        return $status;
    }

}
