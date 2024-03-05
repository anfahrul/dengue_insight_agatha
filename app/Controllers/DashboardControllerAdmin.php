<?php

namespace App\Controllers;

use App\Models\m_User;
use App\Models\m_Data;
use App\Models\m_Cluster;
use App\Models\m_Progres;
use App\Models\m_Kecamatan;
use App\Models\m_Puskesmas;
use App\Models\m_Kelurahan;
use App\Models\m_Tahun;
use App\Models\m_DataDBD;
use App\Models\m_GeoLocationFile;
use CodeIgniter\Files\File;
use App\Models\m_ClusterDBD;
use App\Models\m_IdentificationHistory;
use App\Models\m_IdentificationHistoryCluster;

class DashboardControllerAdmin extends BaseController
{
    protected $m_User;
    protected $m_Data;
    protected $m_Cluster;
    protected $m_Progres;
    protected $m_Kecamatan;
    protected $m_Puskesmas;
    protected $m_Kelurahan;
    protected $m_Tahun;
    protected $m_DataDBD;
    protected $m_GeoLocationFile;
    protected $helpers = ['form'];
    protected $m_ClusterDBD;
    protected $m_IdentificationHistory;
    protected $m_IdentificationHistoryCluster;

    public function __construct()
    {
        $this->m_User = new m_User();
        $this->m_Data = new m_Data();
        $this->m_Cluster = new m_Cluster();
        $this->m_Progres = new m_Progres();
        $this->m_Kecamatan = new m_Kecamatan();
        $this->m_Puskesmas = new m_Puskesmas();
        $this->m_Kelurahan = new m_Kelurahan();
        $this->m_Tahun = new m_Tahun();
        $this->m_DataDBD = new m_DataDBD();
        $this->m_GeoLocationFile = new m_GeoLocationFile();
        $this->m_ClusterDBD = new m_ClusterDBD();
        $this->m_IdentificationHistory = new m_IdentificationHistory();
        $this->m_IdentificationHistoryCluster = new m_IdentificationHistoryCluster();
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


    // puskesmas
    public function data_puskesmas()
    {
        $data = [
            'title' => 'Data Puskesmas',
            'data' => $this->m_Puskesmas->findAll(),
            'modelKecamatan' => $this->m_Kecamatan,
        ];
        return view('dashboard_admin/data_puskesmas', $data);
    }

    public function add_puskesmas()
    {
        $data = [
            'title' => 'add puskesmas',
            'kecamatan' => $this->m_Kecamatan->findAll(),
        ];
        return view('dashboard_admin/add_puskesmas', $data);
    }

    public function proses_add_puskesmas()
    {
        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'nama_puskesmas' => [
                'label' => 'nama_puskesmas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'kecamatan' => [
                'label' => 'kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nama_puskesmas' => $this->request->getPost('nama_puskesmas'),
                'id_kecamatan' => $this->request->getPost('kecamatan'),
            ];

            $this->m_Puskesmas->insert($data);
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('admin/data/puskesmas'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('admin/dashboard/add_puskesmas'));
        }
    }

    public function edit_data_puskesmas($id)
    {
        $data = [
            'title' => 'Edit Data Puskesmas',
            'data' => $this->m_Puskesmas->find($id),
            'modelKecamatan' => $this->m_Kecamatan,
            'kecamatan' => $this->m_Kecamatan->findAll(),
        ];
        return view('dashboard_admin/edit_data_puskesmas', $data);
    }

    public function proses_edit_data_puskesmas()
    {
        $id = $this->request->getPost('id_puskesmas');
        $data = [
            'nama_puskesmas' => $this->request->getPost('nama_puskesmas'),
            'id_kecamatan' => $this->request->getPost('kecamatan'),
        ];
        $this->m_Puskesmas->update($id, $data);
        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to(base_url('admin/data/puskesmas '));
    }

    public function delete_puskesmas($id)
    {
        $this->m_Puskesmas->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('admin/data/puskesmas'));
    }

    // kelurahan
    public function data_kelurahan()
    {
        $data = [
            'title' => 'Data Kelurahan',
            'data' => $this->m_Kelurahan->findAll(),
            'modelKecamatan' => $this->m_Kecamatan,
            'modelPuskesmas' => $this->m_Puskesmas,
        ];
        return view('dashboard_admin/data_kelurahan', $data);
    }

    public function add_kelurahan()
    {
        $data = [
            'title' => 'add kelurahan',
            'kecamatan' => $this->m_Kecamatan->findAll(),
            'puskesmas' => $this->m_Puskesmas->findAll(),
        ];
        return view('dashboard_admin/add_kelurahan', $data);
    }

    public function proses_add_kelurahan()
    {
        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'nama_kelurahan' => [
                'label' => 'nama_kelurahan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'kecamatan' => [
                'label' => 'kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'puskesmas' => [
                'label' => 'puskesmas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nama_kelurahan' => $this->request->getPost('nama_kelurahan'),
                'id_kecamatan' => $this->request->getPost('kecamatan'),
                'id_puskesmas' => $this->request->getPost('puskesmas'),
            ];

            $this->m_Kelurahan->insert($data);
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('admin/data/kelurahan'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('admin/dashboard/add_puskesmas'));
        }
    }

    public function edit_data_kelurahan($id)
    {
        $data = [
            'title' => 'Edit Data Kelurahan',
            'data' => $this->m_Kelurahan->find($id),
            'modelKecamatan' => $this->m_Kecamatan,
            'kecamatan' => $this->m_Kecamatan->findAll(),
            'modelPuskesmas' => $this->m_Puskesmas,
            'puskesmas' => $this->m_Puskesmas->findAll(),
        ];
        return view('dashboard_admin/edit_data_kelurahan', $data);
    }

    public function proses_edit_data_kelurahan()
    {
        $id = $this->request->getPost('id_kelurahan');
        $data = [
            'nama_kelurahan' => $this->request->getPost('nama_kelurahan'),
            'id_kecamatan' => $this->request->getPost('kecamatan'),
            'id_puskesmas' => $this->request->getPost('puskesmas'),
        ];
        $this->m_Kelurahan->update($id, $data);
        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to(base_url('admin/data/kelurahan '));
    }

    public function delete_kelurahan($id)
    {
        $this->m_Kelurahan->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('admin/data/kelurahan'));
    }


    // data batas wilayah
    public function data_batas_wilayah()
    {
        return view('dashboard_admin/data_batas_wilayah', [
            'title' => 'Data Batas Wilayah',
            'errors' => []
        ]);
    }
    
    public function upload_data_batas_wilayah()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Geojson File',
                'rules' => [
                    'uploaded[userfile]',
                ],
            ],
        ];
        if (! $this->validateData([], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('dashboard_admin/data_batas_wilayah', $data);
        }

        
        $geo = $this->request->getFile('userfile');
        $random_name = $geo->getRandomName();
        
        if (! $geo->hasMoved()) {
            $geo->move('geo', $random_name);
            $file_name = $geo->getName();

            $data = [
                'title' => 'Your Title Here',
            ];

            $data_save = [
                'file_name' => $file_name,
            ];

            $this->m_GeoLocationFile->insert($data_save);
            session()->setFlashdata('success', 'Berhasil menambah data');

            return view('dashboard_admin/upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('dashboard_admin/data_batas_wilayah', $data);
    }


    // tahun
    public function data_tahun()
    {
        $data = [
            'title' => 'Data Tahun',
            'data' => $this->m_Tahun->findAll(),
        ];
        return view('dashboard_admin/data_tahun', $data);
    }

    public function proses_add_tahun()
    {
        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'tahun' => [
                'label' => 'tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'tahun' => $this->request->getPost('tahun'),
            ];
            $this->m_Tahun->insert($data);
            $insertedIDOfTheYear = $this->m_Tahun->insertID();
            
            $kelurahan = $this->m_Kelurahan->findAll();
            foreach ($kelurahan as $kel) {
                $data_dbd = [
                    'id_kelurahan' => $kel['id_kelurahan'],
                    'id_tahun' => $insertedIDOfTheYear,
                    'jumlah_penduduk' => 0,
                    'perempuan' => 0,
                    'laki_laki' => 0,
                    'balita' => 0,
                    'remaja' => 0,
                    'dewasa' => 0,
                    'jumlah_kasus' => 0,
                ];
                
                $this->m_DataDBD->insert($data_dbd);
            };
            
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('admin/data/tahun'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('admin/data/tahun'));
        }
    }

    public function delete_tahun($id)
    {
        $this->m_Tahun->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('admin/data/tahun'));
    }


    // cluster

    public function hasil_cluster()
    {
        $lastClusterInserted = $this->m_ClusterDBD->getOrderById()
            ->limit(1)
            ->get()
            ->getRow();
            
        $data = [
            'title' => 'Identifikasi',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_DataDBD->where('id_tahun', 4)->findAll(),
            'cluster' => $lastClusterInserted,
            'modelKelurahan' => $this->m_Kelurahan,
        ];

        // return view('dashboard_user/identifikasi_user', $data);
        return view('dashboard_admin/hasil_identifikasi', $data);
    }

    public function peta_sebaran()
    {
        $lastInsertedGeoLocationFile = $this->m_GeoLocationFile->getOrderById()
            ->limit(1)
            ->get()
            ->getRow();
        
        $lastInsertedIdentificationHistory = $this->m_IdentificationHistory->getOrderById()
            ->limit(1)
            ->get()
            ->getRow();

        $lastIdentificationHistory = $this->m_IdentificationHistoryCluster->getByIdIdentificationHistory($lastInsertedIdentificationHistory->id_identification_history);

        $data = [
            'title' => 'peta sebaran',
            'lastInsertedGeoLocationFile' => $lastInsertedGeoLocationFile->file_name,
            'lastIdentificationHistory' => $lastIdentificationHistory,
            'modelKelurahan' => $this->m_Kelurahan,
        ];

        return view('dashboard_admin/gis_admin', $data);
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
