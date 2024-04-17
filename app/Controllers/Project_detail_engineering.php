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
        helper(['session_helper', 'upload_path_helper']);
    }
    
	public function index($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Engineering Document']),
			'page_title' => view('partials/page-title', ['title' => 'Project Document', 'pagetitle' => 'MDR']),
			'list_doc_engineering' => $this->doc_engineering_model->findAll()
		];
		return view('engineering-document', $data);
	}
	
	public function show_doc_list($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Engineering Document List']),
			'page_title' => view('partials/page-title', ['title' => 'Engineering', 'pagetitle' => 'Document List']),
			'list_doc_engineering' => $this->doc_engineering_model->findAll()
		];
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

    public function show_pdf($doc_id) {
		$data = [   
			'title_meta' => view('partials/title-meta', ['title' => 'Comment PDF']),
			'page_title' => view('partials/page-title', ['title' => 'Document', 'pagetitle' => 'Comment PDF']),
            'doc_id' => $doc_id,
            'file_name' => 'test.pdf',
            'doc_data' => $this->doc_engineering_model->get_filename_by_doc_id($doc_id)
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
            		'plan_ifr'      => date_db_format($this->request->getPost('plan_ifr')),
            		'plan_ifa'      => date_db_format($this->request->getPost('plan_ifa')),
            		'plan_ifc'      => date_db_format($this->request->getPost('plan_ifc'))
            	];
            	$this->doc_engineering_model->reset_increment();
            	$this->doc_engineering_model->save($data);
	        break;
	    }
    }
    
    public function delete($id_project){
        $this->doc_engineering_model->delete($id_project);
        
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
                $this->doc_engineering_model->update($id_update, $data);
            break;
            
            case 'upload_file':
                // read the file
                $uploaded_file = $this->request->getFile('file');
                
                // store the file
                if($uploaded_file){
                    $file   = $this->request->getFile('file');
                    $version= $this->request->getPost('version');
                    $comment= $this->request->getPost('comment') ? $this->request->getPost('comment') : "No Comment";
                    
                    $file->move('upload/doc_engineering');
                    
                    if($version != "nothing"){
                        $version = autoVersioning($version, 'issued');
                    }else{
                        $version = "0A";
                    }
                    
                    // save file name to database
                    $data = [
                        'file'          => $file->getName(),
                        'actual_ifr'    => date_now(),
                        'file_version'  => $version,
                        'file_status'   => 'ifr_upload',
                        'file_comment'  => $comment
                    ];
                    $this->doc_engineering_model->update($id_update, $data);
                    
                    $data_timeline = [
                        'doc_id'                => $id_update,
                        'detail_type'           => 'engineering',
                        'time'                  => $data['actual_ifr'],
                        'timeline_title'        => 'IFR File Upload',
                        'timeline_description'  => 'no desc',
                        'file'                  => $data['file'],
                        'file_comment'          => $data['file_comment'],
                        'timeline_status'       => $data['file_status'],
                        'file_status'           => $data['file_version']
                    ];
                    $this->timeline_doc_model->reset_increment();
                    $this->timeline_doc_model->save($data_timeline);
                }
                else {
                    die("No file specified!");
                }
            break;
            
            case 'approval':
                // read input
                $uploaded_file  = $this->request->getFile('file') ? $this->request->getFile('file') : "nothing";
                $file_status    = $this->request->getPost('file_status');
                $version        = $this->request->getPost('version');
                $comment        = $this->request->getPost('approval_comment_text') ? $this->request->getPost('approval_comment_text') : "No Comment";
                
                if($file_status == 'ifa_approved'){
                    $data = [
                        'actual_ifa'    => date_now(),
                        'file_status'   => $file_status,
                        'file_comment'  => $comment
                    ];
                    $this->doc_engineering_model->update($id_update, $data);
                    $timeline_title = "IFA Approved";
                    
                }else if($file_status == 'ifa_rejected'){
                    $data = [
                        'file_status'   => $file_status,
                        'file_comment'  => $comment
                    ];
                    if($uploaded_file){
                        $uploaded_file->move('upload/doc_engineering');
                        $data ['file'] = $uploaded_file->getName();
                    }
                    $this->doc_engineering_model->update($id_update, $data);
                    $timeline_title = "IFA Rejected with Comment";
                    
                }else if($file_status == 'ifc_approved'){
                    $data = [
                        'actual_ifc'    => date_now(),
                        'file_status'   => $file_status,
                        'file_comment'  => $comment
                    ];
                    $this->doc_engineering_model->update($id_update, $data);
                    $timeline_title = "IFC Approved";
                    
                }else if($file_status == 'ifc_rejected'){
                    $data = [
                        'file_status'   => $file_status,
                        'file_comment'  => $comment
                    ];
                    if($uploaded_file){
                        $uploaded_file->move('upload/doc_engineering');
                        $data ['file'] = $uploaded_file->getName();
                    }
                    $this->doc_engineering_model->update($id_update, $data);
                    $timeline_title = "IFC Rejected with Comment";
                }
                
                $data_timeline = [
                    'doc_id'                => $id_update,
                    'detail_type'           => 'engineering',
                    'time'                  => $data['actual_ifr'],
                    'timeline_title'        => $timeline_title,
                    'timeline_description'  => 'no desc',
                    'file'                  => $data['file'],
                    'file_comment'          => $data['file_comment'],
                    'timeline_status'       => $data['file_status'],
                    'file_status'           => $data['file_version']
                ];
                $this->timeline_doc_model->reset_increment();
                $this->timeline_doc_model->save($data_timeline);
            break;
            
            case 'actual_ifr_file':
                // read the file
                $uploaded_file = $this->request->getFile('file');
                
                // store the file
                if($uploaded_file){
                    $file   = $this->request->getFile('file');
                    $version= $this->request->getPost('version');
                    $file->move('upload/doc_engineering');
                    
                    if($version != "nothing"){
                        $version = autoVersioning($version, 'issued');
                    }else{
                        $version = "0A";
                    }
                    
                    // save file name to database
                    $data = [
                        'actual_ifr_file'   => $file->getName(),
                        'actual_ifr'        => date_now(),
                        'actual_ifr_version'=> $version
                    ];
                    $this->doc_engineering_model->update($id_update, $data);
                    
                    $data_timeline = [
                        'doc_id'                => $id_update,
                        'detail_type'           => 'engineering',
                        'time'                  => $data['actual_ifr'],
                        'timeline_title'        => 'IFR File Upload',
                        'timeline_description'  => 'no desc',
                        'timeline_status'       => 'late',
                        'new_file'              => $data['actual_ifr_file'],
                        'file_status'           => $data['actual_ifr_version']
                    ];
                    $this->timeline_doc_model->reset_increment();
                    $this->timeline_doc_model->save($data_timeline);
                }
                else {
                    die("No file specified!");
                }
            break;
            case 'actual_ifa_file':
                // read the file
                $uploaded_file = $this->request->getFile('file');
                
                // store the file
                if($uploaded_file){
                    $file = $this->request->getFile('file');
                    $file->move('upload/doc_engineering');
                    
                    // save file name to database
                    $data = [
                        'actual_ifa_file'   => $file->getName(),
                        'actual_ifa'        => date_now(),
                    ];
                    $this->doc_engineering_model->update($id_update, $data); 
                }
                else {
                    die("No file specified!");
                }
            break;
            case 'actual_ifc_file':
                // read the file
                $uploaded_file = $this->request->getFile('file');
                
                // store the file
                if($uploaded_file){
                    $file = $this->request->getFile('file');
                    $file->move('upload/engineering_doc/list');
                    
                    // save file name to database
                    $data = [
                        'actual_ifc_file'   => $file->getName(),
                        'actual_ifc'        => date_now(),
                    ];
                    $this->doc_engineering_model->update($id_update, $data); 
                }
                else {
                    die("No file specified!");
                }
            break;
        }
    }
    
    public function pagination(){
        
    }

    // upload originator
    public function up_originator(){
        // read the file
        $uploaded_file = $this->request->getFile('file');
                
        // store the file
        if($uploaded_file){
            $id_doc = $this->request->getPost('id_doc');
            $uploaded_file->move('upload/engineering_doc/list');

            // safe file to engineering doc file
            $data = [
                'id_doc' => $id_doc,
                'filename' => $uploaded_file->getName(),
                'version' => '',
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
            ];
            $update_doc = $this->doc_engineering_model->save($data);
            
            $data_timeline = [
                'doc_id'                => $id_doc,
                'detail_type'           => 'internal_engineering',
                'time'                  => date('Y-m-d H:i:s'),
                'timeline_title'        => 'internal originator file upload',
                'timeline_description'  => 'no desc',
                'timeline_status'       => 'on time',
                'new_file'              => $data['file'],
                'file_status'           => 'internal'
            ];
            $this->timeline_doc_model->save($data_timeline);

            if ($update_doc) {
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

        return $this->response->setJSON($response);
    }

    // upload IFR
    public function up_ifr(){
        // read the file
        $uploaded_file = $this->request->getFile('file');
                
        // store the file
        if($uploaded_file){
            $id_doc = $this->request->getPost('id_doc');
            $version= $this->request->getPost('version');
            $uploaded_file->move('upload/engineering_doc/list');
            
            if($version != "nothing"){
                $version = autoVersioning($version, 'issued');
            }else{
                $version = "0A";
            }
            
            // save file name to database
            $data = [
                'id' => $id_doc,
                'actual_ifr' => date_now(),
                'file' => $uploaded_file->getName(),
                'file_version' => $version
            ];
            $this->doc_engineering_model->save($data);
            
            $data_timeline = [
                'doc_id'                => $id_doc,
                'detail_type'           => 'engineering',
                'time'                  => $data['actual_ifr'],
                'timeline_title'        => 'IFR File Upload',
                'timeline_description'  => 'no desc',
                'timeline_status'       => 'late',
                'new_file'              => $data['file'],
                'file_status'           => $data['file_version']
            ];
            $this->timeline_doc_model->save($data_timeline);

            // return $this->response->setJSON($data);
        }else {
            die("No file specified!");
        }
    }

    // upload IFR
    public function update_ifr(){
        $id_doc = $this->request->getPost('id_doc');
        $version= $this->request->getPost('version');
        $filename= $this->request->getPost('filename');
            
        if($version != "nothing"){
            $version = autoVersioning($version, 'issued');
        }else{
            $version = "0A";
        }
            
        // save file name to database
        $data = [
            'id' => $id_doc,
            'actual_ifr' => date_now(),
            'file_version' => $version
        ];
        $this->doc_engineering_model->save($data);
            
        $data_timeline = [
            'doc_id'                => $id_doc,
            'detail_type'           => 'engineering',
            'time'                  => $data['actual_ifr'],
            'timeline_title'        => 'IFR File Upload',
            'timeline_description'  => 'no desc',
            'timeline_status'       => 'late',
            'new_file'              => $filename,
            'file_status'           => $version
        ];
        $this->timeline_doc_model->save($data_timeline);
    }

    // reject doc
    public function reject(){
        $step = $this->request->getPost('step');

        if($step == 'internal'){
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
                'file_status'           => 'internal'
            ];
        }else if($step == 'external'){
            $data_timeline = [
                'doc_id'                => $id_doc,
                'detail_type'           => 'external_engineering',
                'time'                  => date('Y-m-d H:i:s'),
                'timeline_title'        => 'External IFA file reject',
                'timeline_description'  => 'no desc',
                'timeline_status'       => 'on time',
                'new_file'              => '',
                'file_status'           => 'external'
            ];
        }
        
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
                'file_status'           => ''
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
    
}
