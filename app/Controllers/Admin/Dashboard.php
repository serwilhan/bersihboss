<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController {


    #DASHBOARD PAGE
    public function index() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/index', $data);
    }

    #ADMIN PAGE
    public function user() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/user', $data);
    }

    #CUSTOMER PAGE
    public function customer() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/customer', $data);
    }

    #MITRA PAGE
    public function mitra() {

        $data = [
            'title' => "Admin Dashboard"
        ];

        return view('admin/mitra', $data);
    }
}
