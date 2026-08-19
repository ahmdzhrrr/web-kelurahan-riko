<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PegawaiModel;
use App\Models\SettingModel;
use App\Models\KontakModel;

class PegawaiController extends Controller
{
    protected PegawaiModel $pegawai;
    protected SettingModel $setting;
    protected KontakModel $kontak;

    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
        $this->setting = new SettingModel();
        $this->kontak = new KontakModel();
    }

    /**
     * Halaman Aparatur Kelurahan
     */
    public function index()
    {
        return $this->view('pegawai/index', [
            'setting' => $this->setting->getSetting(),
            'kontak'  => $this->kontak->getKontak(),
            'pegawai' => $this->pegawai->allPegawai(),
        ]);
    }

    /**
     * Halaman Struktur Organisasi
     *
     * Struktur ditampilkan dalam bentuk gambar,
     * bukan dibangun dari data pegawai.
     */
    public function struktur()
    {
        return $this->view('pegawai/struktur', [
            'setting' => $this->setting->getSetting(),
            'kontak'  => $this->kontak->getKontak(),
        ]);
    }
}