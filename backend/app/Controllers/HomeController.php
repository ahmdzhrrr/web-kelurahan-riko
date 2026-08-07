<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SettingModel;
use App\Models\KontakModel;
use App\Models\ProfilModel;
use App\Models\BeritaModel;
use App\Models\PegawaiModel;
use App\Models\FasilitasModel;

class HomeController extends Controller
{
    public function index()
    {
        $setting = new SettingModel();

        $kontak = new KontakModel();

        $profil = new ProfilModel();

        $berita = new BeritaModel();

        $pegawai = new PegawaiModel();

        $fasilitas = new FasilitasModel();

        $this->view('home', [

            'setting' => $setting->getSetting(),

            'kontak' => $kontak->getKontak(),

            'profil' => $profil->getProfil(),

            'berita' => $berita->featured(),

            'pegawai' => $pegawai->allPegawai(),

            'fasilitas' => $fasilitas->allFasilitas(),

        ]);
    }
}