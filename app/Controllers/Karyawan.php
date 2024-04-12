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
    public function add_comment(){
		$data_add = [
			'name' => $this->request->getPost('name'),
			'email' => $this->request->getPost('email'),
			'phone' => $this->request->getPost('phone'),
			'created_by' => sess('active_user_id')
		];
		$save_file = $this->Model_engineering_doc_comment->save($data_add);

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

    // list karyawan
	public function ajax_get_list(){
        $returnedData = $this->Model_karyawan->get_datatable_main();

        $data = [];
        foreach ($returnedData['return_data'] as $itung => $baris) {
            $aksi = "
                <a class='btn btn-sm btn-info' id='btn_edit'
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
    
}
