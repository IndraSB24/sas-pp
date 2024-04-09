<?php

namespace App\Controllers;
use App\Models\Model_project;
use App\Models\Model_doc_engineering;


class Karyawan extends BaseController
{
    protected $doc_engineering_model;

    function __construct(){
        $this->doc_engineering_model = new Model_doc_engineering();
    }
    
	public function index()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Employee']),
			'page_title' => view('partials/page-title', ['title' => 'Overal', 'pagetitle' => 'Employee Master Data']),
            'list_doc_engineering' => $this->doc_engineering_model->findAll()
		];
		return view('master-data-karyawan', $data);
	}
}
