<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PendudukModel;
use App\Models\SettingModel;
use App\Models\KontakModel;
use App\Models\RtModel;

class PendudukController extends Controller
{
    protected PendudukModel $penduduk;
    protected KontakModel $kontak;
    protected SettingModel $setting;
    protected RtModel $rt;

    public function __construct()
    {
        $this->penduduk = new PendudukModel();
        $this->kontak = new KontakModel();
        $this->setting = new SettingModel();
        $this->rt = new RtModel();
    }

    /**
     * Halaman utama infografis penduduk
     */
    public function index()
    {
        $data = [
            'pekerjaan'      => $this->penduduk->getPekerjaan(),
            'pendidikan'     => $this->penduduk->getPendidikan(),
            'kepalaKeluarga' => $this->penduduk->getKepalaKeluarga(),
            'rekapitulasi'   => $this->penduduk->getRekapitulasi(),
            'kkPerRT'        => $this->penduduk->getKKPerRT(),
            'pendudukPerRT'  => $this->penduduk->getPendudukPerRT(),
            'umur'           => $this->penduduk->getUmur(),

            // Data umum
            'setting'        => $this->setting->getSetting(),
            'kontak'         => $this->kontak->getKontak(),

            // Data Ketua RT
            'rt'             => $this->rt->allActive(),
        ];

        return $this->view('penduduk/index', $data);
    }
}