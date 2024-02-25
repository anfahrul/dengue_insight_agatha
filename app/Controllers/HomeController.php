<?php

namespace App\Controllers;

use App\Models\m_User;
use App\Models\m_Data;

class HomeController extends BaseController
{
    protected $m_User;
    protected $m_Data;

    public function __construct()
    {
        $this->m_User = new m_User();
        $this->m_Data = new m_Data();
    }

    public function index()
    {
        return view('auth/home');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->m_User->where('username', $username)->first();

        if ($user) {
            if ($password == $user['password']) {
                if ($user['usertype'] == 'admin') {
                    $data = [
                        'username' => $user['username'],
                        'usertype' => $user['usertype'],
                        'is_login' => TRUE
                    ];
                    session()->set($data);
                    return redirect()->to(base_url('admin/dashboard'));
                } else {
                    $data = [
                        'username' => $user['username'],
                        'usertype' => $user['usertype'],
                        'is_login' => TRUE
                    ];
                    session()->set($data);
                    return redirect()->to(base_url('dashboard'));
                }
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        return view('auth/login');
    }

    public function logout_admin()
    {
        return view('auth/login_admin');
    }
}
