<?php

namespace App\Controllers;

use App\Models\m_User;
use App\Models\m_Data;
use App\Models\m_Cluster;
use App\Models\m_Progres;
use App\Models\m_Kecamatan;

class DashboardControllerAdmin extends BaseController
{
    protected $m_User;
    protected $m_Data;
    protected $m_Cluster;
    protected $m_Progres;
    protected $m_Kecamatan;

    public function __construct()
    {
        $this->m_User = new m_User();
        $this->m_Data = new m_Data();
        $this->m_Cluster = new m_Cluster();
        $this->m_Progres = new m_Progres();
        $this->m_Kecamatan = new m_Kecamatan();
    }


    public function dashboard_admin()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('dashboard_admin/dashboard_admin', $data);
    }

    public function profile_admin()
    {
        $data = [
            'title' => 'My profile admin',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
        ];
        return view('dashboard_admin/profile_admin', $data);
    }

    public function data_pengguna()
    {
        $data = [
            'title' => 'Data Pengguna',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_User->where('usertype', 'user')->findAll(),
        ];
        return view('dashboard_admin/data_pengguna', $data);
    }

    public function add_user()
    {
        $data = [
            'title' => 'add user',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
        ];
        return view('dashboard_admin/add_user', $data);
    }

    public function proses_add_user()
    {
        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 5 karakter.',
                ]
            ],
            'usertype' => [
                'label' => 'Usertype',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'usertype' => $this->request->getPost('usertype'),
                'email' => $this->request->getPost('email'),
            ];

            $this->m_User->insert($data);
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('admin/data/pengguna'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('admin/dashboard/add_user'));
        }
    }

    public function edit_data_admin($id)
    {
        $data = [
            'title' => 'Edit Data',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_User->find($id),
        ];
        return view('dashboard_admin/edit_data_admin', $data);
    }

    public function proses_edit_data_admin()
    {
        $id = $this->request->getPost('id_user');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'usertype' => $this->request->getPost('usertype'),
            'email' => $this->request->getPost('email'),
        ];
        $this->m_User->update($id, $data);
        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to(base_url('admin/data/pengguna '));
    }

    public function delete($id)
    {
        $this->m_User->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('admin/data/pengguna'));
    }

    // kecamatan
    public function data_kecamatan()
    {
        $data = [
            'title' => 'Data Kecamatan',
            // 'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Kecamatan->findAll(),
        ];
        return view('dashboard_admin/data_kecamatan', $data);
    }


    public function add_kecamatan()
    {
        $data = [
            'title' => 'add kecamatan',
            // 'user' => $this->m_User->where('username', session()->get('username'))->first(),
        ];
        return view('dashboard_admin/add_kecamatan', $data);
    }
    

    public function proses_add_kecamatan()
    {
        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'nama_kecamatan' => [
                'label' => 'Nama Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
            ];

            $this->m_Kecamatan->insert($data);
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('admin/data/kecamatan'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('admin/dashboard/add_kecamatan'));
        }
    }

    public function edit_data_kecamatan($id)
    {
        $data = [
            'title' => 'Edit Data Kecamatan',
            // 'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Kecamatan->find($id),
        ];
        return view('dashboard_admin/edit_data_kecamatan', $data);
    }

    public function proses_edit_data_kecamatan()
    {
        $id = $this->request->getPost('id_kecamatan');
        $data = [
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
        ];
        $this->m_Kecamatan->update($id, $data);
        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to(base_url('admin/data/kecamatan '));
    }

    public function delete_kecamatan($id)
    {
        $this->m_Kecamatan->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('admin/data/kecamatan'));
    }


    // cluster

    public function hasil_cluster()
    {
        $data = [
            'title' => 'Identifikasi',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Data->findAll(),
            'cluster' => $this->m_Cluster->first(),
        ];

        return view('dashboard_admin/hasil_cluster', $data);
    }

    public function peta_balita()
    {
        $data = [
            'title' => 'peta balita'
        ];
        return view('dashboard_admin/peta_sebaran_balita', $data);
    }

    public function view_file_admin()
    {
        $data = [
            'title' => 'View File Bulan',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Progres->findAll(),
        ];

        return view('dashboard_admin/view_file', $data);
    }
}
