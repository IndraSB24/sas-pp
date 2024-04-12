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
    public function ajax_get_comment(){
        $fetched_data = $this->model_karyawan->get_datatable_main();
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
