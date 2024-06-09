<?php

namespace App\Controllers;

use App\Models\Model_user;

class Auth extends BaseController
{
    protected $main_model;

    function __construct()
    {
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

        if ($data) {
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $user_data = $this->main_model->get_by_id($data->id);

                $ses_data = [
                    'activeId' => $user_data->id,
                    'username' => $user_data->username,
                    'nama' => $user_data->nama,
                    'role' => $user_data->role_name,
                    'signatureFile' => $user_data->signature_filename,
                    'id_karyawan' => $user_data->id_karyawan,
                    'logged_in' => TRUE,
                    'last_activity' => time() // Set last_activity for session timeout management
                ];

                $session->set($ses_data);
                $session->setFlashdata('message', 'Login Berhasil');
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password Anda Salah');
                return redirect()->to('/');
            }
        } else {
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

    // Add user
    public function addUser()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Basic validation
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username and password are required.');
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the data to be inserted
        $data = [
            'username' => $username,
            'password' => $hashedPassword,
        ];

        // Insert the data
        if ($this->main_model->insert($data)) {
            return redirect()->back()->with('success', 'User created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create user.');
        }
    }
}
