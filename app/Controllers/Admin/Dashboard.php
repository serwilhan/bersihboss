<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController {


    #DASHBOARD PAGE
    public function index() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/layout/template', $data);
    }

    #USER PAGE
    public function user() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/user', $data);
    }
}
