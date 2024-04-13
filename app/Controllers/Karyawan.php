<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_karyawan;


class Karyawan extends BaseController
{
    protected $Model_karyawan;

    function __construct(){
        $this->Model_karyawan = new Model_karyawan();
		helper(['session_helper']);
    }
    
	public function index()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Employee']),
			'page_title' => view('partials/page-title', ['title' => 'Overal', 'pagetitle' => 'Employee Master Data'])
		];
		return view('master-data-karyawan', $data);
	}

	// add karyawan
    public function add_karyawan(){
		$data_add = array_intersect_key(
            $this->request->getPost(),
            array_flip([
                'name', 'email', 'phone'
            ])
        );
        // echo '<pre>'; print_r( $data_add );die; echo '</pre>';
        $data['created_by'] = sess('active_user_id');
		$save_file = $this->Model_karyawan->save($data_add);

		if ($save_file) {
			$response = [
				'success' => true,
				'message' => 'Employee added successfully.'
			];
		} else {
			$response = [
				'success' => false,
				'message' => 'Failed to add employee.'
			];
		}

        return $this->response->setJSON($response);
    }

	// edit =================================================================================================
    public function edit_karyawan(){
        $data = array_intersect_key(
            $this->request->getPost(),
            array_flip([
                'name', 'email', 'phone'
            ])
        );
        $data['id'] = $this->request->getPost('edit_id');
        $data['created_by'] = sess('active_user_id');

        $insertData = $this->Model_karyawan->save($data);
        
        if ($insertData) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false];
        }
        return $this->response->setJSON($response);
    }
    
    // delete ===============================================================================================
    public function delete_karyawan()
    {
        $deleteData = $this->Model_karyawan->delete($this->request->getPost('id'));

        if ($deleteData) {
            $response = ['success' => true];
        } else {
            $response = ['success' => false];
        }
        return $this->response->setJSON($response);
    }

    public function karyawan_doc_list($id) {
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Employee']),
			'page_title' => view('partials/page-title', ['title' => 'Overal', 'pagetitle' => 'List Document'])
		];
		return view('karyawan-doc-list', $data);
    }

    // list karyawan
	public function ajax_get_list(){
        $returnedData = $this->Model_karyawan->get_datatable_main();
        // echo '<pre>'; print_r( $returnedData );die; echo '</pre>';
        $data = [];
        foreach ($returnedData['return_data'] as $itung => $baris) {
            $aksi = "
                <button class='btn btn-sm btn-info waves-effect waves-light' data-id='$baris->id' id='showPdf'>
					<i class='fas fa-file-pdf'></i> Document
				</button>
                <a class='btn btn-sm btn-success' id='btn_edit'
                    data-id='$baris->id'
                >
                    <i class='far fa-edit'></i>
                </a>
                <a class='btn btn-sm btn-danger' id='btn_delete' 
                    data-id='$baris->id'
                    data-name='$baris->name'
                > 
                    <i class='fas fa-trash-alt'></i>
                </a>
            ";

            $data[] = [
                '<span class="text-center">' . ($itung + 1) . '</span>',
                '<span class="text-center">' . $baris->name . '</span>',
                '<span class="text-center">' . $baris->email . '</span>',
                '<span class="text-center">' . $baris->phone . '</span>',
                '<span class="text-center">' . $aksi . '</span>'
            ];
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $returnedData['count_filtered'],
            "recordsFiltered" => $returnedData['count_all'],
            "data" => $data,
        ];

        // Output to JSON format
        return $this->response->setJSON($output);
    }

	// ajax get data edit
    public function ajax_get_item_data(){
        $id = $this->request->getPost('id');

        $fetch_edit_data = $this->model_item->get_by_id($id);

        return $this->response->setJSON($fetch_edit_data[0]);
    }
    
}
