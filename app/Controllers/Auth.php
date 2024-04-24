<?php

namespace App\Controllers;
use App\Models\Model_user;

class Auth extends BaseController
{
    protected $main_model;
 
    function __construct(){
        $this->main_model = new Model_user();
    }
    
    public function index()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('auth-login', $data);
	}

	public function show_pages_register()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Register'])
		];
		return view('auth-register', $data);
	}

	public function show_pages_recoverpw()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Recover_Password'])
		];
		return view('auth-recoverpw', $data);
	}
	
	public function login()
    {
	    $session = session();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->main_model->where('username', $username)->first();
        if($data){
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            if($pass == $password){
                $ses_data = [
                    'activeId'  => $data->id,
                    'username'  => $data->username,
                    'nama'      => $data->nama,
                    'role'      => $data->id_role,
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                $session->setFlashdata('message', 'Login Berhasil');
                return redirect()->to('/project-dashboard');
            }else{
                $session->setFlashdata('error', 'Password Anda Salah');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('error', 'Username Tidak Ditemukan');
            return redirect()->to('/');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->setFlashdata('message', 'Berhasil Logout');
        $session->destroy();
        return redirect()->to('/');
    }

}
