<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController {

    protected $adminModel;
    public function __construct() {

        $this->adminModel = new AdminModel();
    }

    #LOGIN PAGE
    public function index() {

        $data = [
            'title' => 'Admin Login',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/login', $data);
    }

    #LOGIN AUTHENTICATION AND LOGIN PROCESS
    public function auth() {

        #Validasi halaman login
        if (!$this->validate([
            'email_admin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The email field is required.'
                ]
            ],
            'password_admin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The password field is required.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/admin')->withInput()->with('validation', $validation);
        } else {

            #Cek input user = database
            $email = $this->request->getPost('email_admin');
            $password = $this->request->getPost('password_admin');

            $admin = $this->adminModel->login($email, $password);

            if ($admin) {
                #User Berhasil Login
                session()->set('email_admin', $admin['email_admin']);
                session()->set('password_admin', $admin['password_admin']);
                return redirect()->to('/dashboard');
            } else {
                #User Gagal Login
                session()->setFlashdata('msg', 'Email is not registered!');
                return redirect()->to('/admin');
            }
        }
    }

    #LOGIN PROCCESS
    // public function loginaction() {

    //     $email = $this->request->getPost('email_admin');
    //     $password = $this->request->getPost('password_admin');

    //     $admin = $this->adminModel->login($email, $password);

    //     if ($admin) {
    //         #User Berhasil Login
    //         session()->set('email_admin', $admin['email_admin']);
    //         session()->set('password_admin', $admin['password_admin']);
    //         return redirect()->to('/admin/adminpanel');
    //     } else {
    //         #User Gagal Login
    //         session()->setFlashdata('msg', 'Email is not registered!');
    //         return redirect()->to('/admin');
    //     }
    // }
}
