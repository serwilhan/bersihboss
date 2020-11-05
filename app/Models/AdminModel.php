<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = false;

    protected $allowedFields = ['email_admin', 'password_admin'];

    public function login($email, $password) {
        return $this->db->table('admin')
            ->where(array('email_admin' => $email, 'password_admin' => $password))
            ->get()->getRowArray();
    }
}
