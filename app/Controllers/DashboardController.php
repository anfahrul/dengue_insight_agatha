<?php

namespace App\Controllers;


use App\Models\m_User;
use App\Models\m_Data;
use App\Models\m_Cluster;
use App\Models\m_Progres;
use App\Models\m_DataDBD;
use App\Models\m_Kelurahan;
use App\Models\m_Tahun;
use App\Models\m_ClusterDBD;


class DashboardController extends BaseController
{
    protected $m_User;
    protected $m_Data;
    protected $m_Cluster;
    protected $m_Progres;
    protected $m_DataDBD;
    protected $m_Kelurahan;
    protected $m_Tahun;
    protected $m_ClusterDBD;

    public function __construct()
    {
        $this->m_User = new m_User();
        $this->m_Data = new m_Data();
        $this->m_Cluster = new m_Cluster();
        $this->m_Progres = new m_Progres();
        $this->m_DataDBD = new m_DataDBD();
        $this->m_Kelurahan = new m_Kelurahan();
        $this->m_Tahun = new m_Tahun();
        $this->m_ClusterDBD = new m_ClusterDBD();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard user'
        ];
        return view('dashboard_user/dashboard_user', $data);
    }

    public function dashboard_user()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('dashboard_user/dashboard_user', $data);
    }

    public function profile_user()
    {
        $data = [
            'title' => 'My Profile',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
        ];
        return view('dashboard_user/profile_user', $data);
    }

    public function data_balita()
    {
        $data = [
            'title' => 'Data Balita',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Data->findAll(),
            'cluster' => $this->m_Cluster->first(),
        ];
        return view('dashboard_user/data_balita', $data);
    }
    
    public function data_dbd()
    {
        $lastInsertedID = $this->m_Tahun->getOrderById()
            ->limit(1)
            ->get()
            ->getRow();

        $data = [
            'title' => 'Data DBD',
            'data' => $this->m_DataDBD->where('id_tahun', $lastInsertedID->id_tahun)->findAll(),
            'modelKelurahan' => $this->m_Kelurahan,
            'modelTahun' => $this->m_Tahun,
            'tahun' => $this->m_Tahun->findAll(),
            'year' => $lastInsertedID->id_tahun
        ];

        return view('dashboard_user/data_dbd', $data);
    }
    
    public function data_dbd_get_by_year()
    {
        $yearSelected = $this->request->getPost('tahun');

        $data = [
            'title' => 'Data DBD',
            'data' => $this->m_DataDBD->where('id_tahun', $yearSelected)->findAll(),
            'modelKelurahan' => $this->m_Kelurahan,
            'modelTahun' => $this->m_Tahun,
            'tahun' => $this->m_Tahun->findAll(),
            'year' => $yearSelected
        ];

        return view('dashboard_user/data_dbd', $data);
    }

    public function tambah_data()
    {
        $data = [
            'title' => 'Tambah Data',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
        ];
        return view('dashboard_user/tambah_data_user', $data);
    }

    public function proses_tambah_data()
    {

        $validation =  \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|numeric|min_length[16]|max_length[16]|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => 'data harus angka.',
                    'min_length' => '{field} harus 16 digit.',
                    'max_length' => '{field} harus 16 digit.',
                ]
            ],
            'nama_anak' => [
                'label' => 'Nama Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jk' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_ortu' => [
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tgl_ukur' => [
                'label' => 'Tanggal Pengukuran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'tinggi_anak' => [
                'label' => 'Tinggi Anak',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => 'data harus angka.',
                ]
            ],
            'berat_anak' => [
                'label' => 'Berat Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => 'data harus angka.',
                ]
            ],
            'lat' => [
                'label' => 'Latitude',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => 'data harus angka.',
                ]
            ],
            'long' => [
                'label' => 'Longitude',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => 'data harus angka.',
                ]
            ],
        ]);

        // Mengecek apakah data yang diterima valid atau tidak
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama_anak' => $this->request->getPost('nama_anak'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jk' => $this->request->getPost('jk'),
                'nama_ortu' => $this->request->getPost('nama_ortu'),
                'tgl_ukur' => $this->request->getPost('tgl_ukur'),
                'tinggi_anak' => $this->request->getPost('tinggi_anak'),
                'berat_anak' => $this->request->getPost('berat_anak'),
                'lat' => $this->request->getPost('lat'),
                'long' => $this->request->getPost('long'),
            ];

            $this->m_Data->insert($data);
            session()->setFlashdata('success', 'Berhasil menambah data');
            return redirect()->to(base_url('dashboard/data_balita'));
        } else {
            // Data tidak valid, tampilkan pesan kesalahan
            $errors = $validation->getErrors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('dashboard/tambah_data'));
        }
    }

    public function edit_data($id)
    {
        $data = [
            'title' => 'Edit Data',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_DataDBD->find($id),
            'modelKelurahan' => $this->m_Kelurahan,
        ];
        return view('dashboard_user/edit_data', $data);
    }

    public function proses_edit_data()
    {
        $id = $this->request->getPost('id_data_dbd');
        $data = [
            'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk'),
            'perempuan' => $this->request->getPost('perempuan'),
            'laki_laki' => $this->request->getPost('laki_laki'),
            'balita' => $this->request->getPost('balita'),
            'remaja' => $this->request->getPost('remaja'),
            'dewasa' => $this->request->getPost('dewasa'),
            'jumlah_kasus' => $this->request->getPost('jumlah_kasus'),
        ];

        $this->m_DataDBD->update($id, $data);
        session()->setFlashdata('success', 'Berhasil mengubah data');
        return redirect()->to(base_url('dashboard/data_dbd'));
    }

    public function hapus_data($id)
    {
        $this->m_Data->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('dashboard/data_balita'));
    }


    // clustering dan identifikasi
    public function cluster()
    {
        $data = [
            'title' => 'Cluster',
        ];

        return view('dashboard_user/cluster', $data);
    }

    public function cluster_add()
    {
        $c1a = $this->request->getPost('c1a');
        $c1b = $this->request->getPost('c1b');
        $c1c = $this->request->getPost('c1c');
        $c1d = $this->request->getPost('c1d');
        $c1e = $this->request->getPost('c1e');
        $c1f = $this->request->getPost('c1f');
        $c2a = $this->request->getPost('c2a');
        $c2b = $this->request->getPost('c2b');
        $c2c = $this->request->getPost('c2c');
        $c2d = $this->request->getPost('c2d');
        $c2e = $this->request->getPost('c2e');
        $c2f = $this->request->getPost('c2f');
        $c3a = $this->request->getPost('c3a');
        $c3b = $this->request->getPost('c3b');
        $c3c = $this->request->getPost('c3c');
        $c3d = $this->request->getPost('c3d');
        $c3e = $this->request->getPost('c3e');
        $c3f = $this->request->getPost('c3f');

        $data = [
            'c1a' => $c1a,
            'c1b' => $c1b,
            'c1c' => $c1c,
            'c1d' => $c1d,
            'c1e' => $c1e,
            'c1f' => $c1f,
            'c2a' => $c2a,
            'c2b' => $c2b,
            'c2c' => $c2c,
            'c2d' => $c2d,
            'c2e' => $c2e,
            'c2f' => $c2f,
            'c3a' => $c3a,
            'c3b' => $c3b,
            'c3c' => $c3c,
            'c3d' => $c3d,
            'c3e' => $c3e,
            'c3f' => $c3f,
        ];

        $this->m_ClusterDBD->insert($data);
        return redirect()->to(base_url('dashboard/cluster'));
    }

    public function identifikasi_user()
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

        return view('dashboard_user/identifikasi_user', $data);
    }

    public function klasifikasi_user()
    {
        $data = [
            'title' => 'Klasifikasi'
        ];
        return view('dashboard_user/klasifikasi_user', $data);
    }

    public function peta_sebaran_user()
    {
        $lat_c1 = session()->get('lat_c1');
        $long_c1 = session()->get('long_c1');
        $lat_c2 = session()->get('lat_c2');
        $long_c2 = session()->get('long_c2');
        $lat_c3 = session()->get('lat_c3');
        $long_c3 = session()->get('long_c3');

        $data = [
            'title' => 'peta sebaran',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'lat_c1' => $lat_c1,
            'long_c1' => $long_c1,
            'lat_c2' => $lat_c2,
            'long_c2' => $long_c2,
            'lat_c3' => $lat_c3,
            'long_c3' => $long_c3,

        ];
        return view('dashboard_user/gis', $data);
    }

    public function view_file1()
    {
        $data = [
            'title' => 'View File Bulan',
            'user' => $this->m_User->where('username', session()->get('username'))->first(),
            'data' => $this->m_Progres->findAll(),
        ];

        return view('dashboard_user/view_file_bulan', $data);
    }
}
