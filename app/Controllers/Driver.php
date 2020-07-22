<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DriverModel;
use App\Models\ExploreModel;
use App\Models\LoginModel;


class Driver extends Controller
{
    public function __construct()
    {
        $this->DriverModel = new DriverModel();
        $this->ExploreModel = new ExploreModel();
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        $nama = session()->get('nama');
        $akun = $this->LoginModel->cek_login($nama);
        if (session()->get('nama') == '') {
            session()->setFlashdata('gagal', 'Login dulu');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Profil | Spairum.com',
            'akun' => $akun

        ];

        return   view('Home/profil', $data);
    }

    public function explore()
    {

        if (session()->get('nama') == '') {
            session()->setFlashdata('gagal', 'Login dulu');
            return redirect()->to('/');
        }
        $stasiun = $this->ExploreModel->findAll();
        $data = [
            'title' => 'Explore | Spairum.com',
            'page' => 'Explore',
            'stasiun' => $stasiun
        ];

        return   view('Home/explore', $data);
    }

    public function History()
    {
        if (session()->get('nama') == '') {
            session()->setFlashdata('gagal', 'Login dulu');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Riwayat | Spairum.com',
            'page' => 'Riwayat',

        ];

        return   view('Home/History', $data);
    }

    public function Edit()
    {

        if (session()->get('nama') == '') {
            session()->setFlashdata('gagal', 'Login dulu');
            return redirect()->to('/');
        }
        $nama = session()->get('nama');
        $akun = $this->LoginModel->cek_login($nama);
        $data = [
            'title' => 'Edit Profile | Spairum.com',
            'page' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'akun' => $akun
        ];
        // return view('auth/regis', $data);
        return   view('Home/edit', $data);
    }

    public function up_telp($id)
    {

        // dd($this->request->getVar());
        $this->DriverModel->save([
            'id' => $id,
            'telp' => $this->request->getVar('telp'),

        ]);
        return redirect()->to('/driver');
    }
    public function up_profil($id)
    {
        if (!$this->validate([
            'profil' => [
                'rules' => 'uploaded[profil]|max_size[profil,1024]|is_image[profil]|mime_in[profil,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Gambar terlebih dahulu',
                    'is_image' => 'yang anda pilih bukan Gambar',
                    'mime_in' => 'format file tidak mendukung'
                ]
            ]
        ])) {
            return redirect()->to('/driver/edit')->withInput();
        }
        // Save file
        $fileProfil = $this->request->getFile('profil');
        // dd($fileProfil);
        $fileProfil->move('img/driver');
        $potoProfil = $fileProfil->getName();

        // dd($this->request->getVar());
        $this->DriverModel->save([
            'id' => $id,
            'profil' => $potoProfil,

        ]);
        return redirect()->to('/driver');
    }
}