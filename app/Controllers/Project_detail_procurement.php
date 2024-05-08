<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_doc_procurement;
use App\Models\Model_doc_engineering;
use App\Models\Model_data_helper;
use App\Models\Model_procurement_doc_file;

class Project_detail_procurement extends BaseController
{
    protected $Model_doc_procurement, $Model_project, $Model_doc_engineering, $Model_data_helper,
		$Model_procurement_doc_file;
 
    function __construct(){
        $this->Model_doc_procurement = new Model_doc_procurement();
        $this->Model_project = new Model_project();
		$this->Model_doc_engineering = new Model_doc_engineering();
		$this->Model_data_helper = new Model_data_helper();
		$this->Model_procurement_doc_file = new Model_procurement_doc_file();
		helper(['session_helper', 'upload_path_helper', 'wa_helper']);
    }
    
	public function index($project_id=null){
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Procurement Document']),
			'page_title' => view('partials/page-title', ['title' => 'Project Document', 'pagetitle' => 'Procurement']),
			'list_doc_procurement' => $this->Model_doc_engineering->findAll()
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

	// upload po
    public function up_po(){
        // read the file
        $uploaded_file = $this->request->getFile('file');
                
        // store the file
        if($uploaded_file){
            $store_file = $uploaded_file->move('upload/procurement_doc/list');
            
            $id_doc = $this->request->getPost('id_doc');
            $doc_name= $this->request->getPost('doc_name');
            $doc_code= $this->request->getPost('doc_code');
            $man_hour_actual= $this->request->getPost('man_hour_actual');

            $input_date = $this->request->getPost('backdate') ?: date('Y-m-d H:i:s');

            // safe file to procurement doc file
            $data = [
                'id_doc' => $id_doc,
                'filename' => $uploaded_file->getName(),
                'version' => "",
                'created_by' => sess('active_user_id')
            ];
            $returned_id = $this->Model_procurement_doc_file->insertWithReturnId($data);
            
            // save file name to database
            $data = [
                'id' => $id_doc,
                'po_filename' => $uploaded_file->getName(),
                'po_act' => $input_date,
				'po_id_file' => $returned_id,
				'po_status' => 'uploaded'
            ];
            $update_doc = $this->Model_doc_procurement->save($data);
            
            // $data_timeline = [
            //     'doc_id'                => $id_doc,
            //     'detail_type'           => 'internal_engineering',
            //     'time'                  => $input_date,
            //     'timeline_title'        => 'internal originator file upload',
            //     'timeline_description'  => 'new file upload',
            //     'timeline_status'       => 'on time',
            //     'new_file'              => $data['file'],
            //     'file_status'           => 'internal',
            //     'created_by'            => sess('active_user_id'),
            //     'id_file'               => $returned_id
            // ];
            // $this->timeline_doc_model->save($data_timeline);

			$proc_data = $this->Model_doc_procurement->get_by_id($id_doc);
			$doc_desc = $proc_data->activity_name_lvl_1;
			if($proc_data->activity_name_lvl_2){
				$doc_desc = $doc_desc . ' -> ' . $proc_data->activity_name_lvl_2;

				if($proc_data->activity_name_lvl_3){
					$doc_desc = $doc_desc . ' -> ' . $proc_data->activity_name_lvl_3;

					if($proc_data->activity_name_lvl_4){
						$doc_desc = $doc_desc . ' -> ' . $proc_data->activity_name_lvl_4;
					}
				}
			}

            $nope_sandhi = "6287888276877";
            $nope_indra = "6285274897212";
            $data_wa = [
                'penerima' => $nope_indra,
                'doc_name' => $doc_desc,
                'doc_group' => $proc_data[0]->group_name,
                'tgl_upload' => $input_date,
                'link_to_open' => "https://sasinfinity.com/inpormasi/public/commentPdfProcurement/".$id_doc."/po"
            ];
            procurementPoUp($data_wa);

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

	// 
	public function show_pdf($doc_id, $step, $isPreviw=false) {
		$data = [   
			'title_meta' => view('partials/title-meta', ['title' => 'Comment PDF']),
			'page_title' => view('partials/page-title', ['title' => 'Document', 'pagetitle' => 'Comment PDF']),
            'doc_id' => $doc_id,
            'file_name' => 'test.pdf',
            'doc_data' => $this->Model_doc_procurement->get_by_id($doc_id),
            'step' => $step,
            'is_preview' => $isPreviw,
		];
        // echo '<pre>'; print_r( $data );die; echo '</pre>';
		return view('show_pdf_procurement', $data);
    }

}
