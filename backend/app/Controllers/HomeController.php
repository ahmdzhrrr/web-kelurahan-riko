<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SettingModel;
use App\Models\HeroModel;
use App\Models\KontakModel;
use App\Models\ProfilModel;
use App\Models\VisiMisiModel;
use App\Models\BeritaModel;
use App\Models\PegawaiModel;
use App\Models\FasilitasModel;
use App\Models\PelayananModel;
use App\Models\GaleriModel;

class HomeController extends Controller
{
    public function index()
    {
        $setting   = new SettingModel();
        $hero      = new HeroModel();
        $kontak    = new KontakModel();
        $profil    = new ProfilModel();
        $visi      = new VisiMisiModel();
        $berita    = new BeritaModel();
        $pegawai   = new PegawaiModel();
        $fasilitas = new FasilitasModel();
        $pelayanan = new PelayananModel();
        $galeri    = new GaleriModel();

        $this->view('home', [

            // Identitas website
            'setting' => $setting->getSetting(),

            // Hero
            'hero' => $hero->getHero(),

            // Kontak
            'kontak' => $kontak->getKontak(),

            // Profil
            'profil' => $profil->getProfil(),

            // Visi & Misi
            'visi' => $visi->getVisi(),
            'misi' => $visi->getMisi(),

            // Pelayanan
            'pelayanan' => $pelayanan->featuredPelayanan(3),

            // Berita
            'berita' => $berita->latestPublished(3),

            // Galeri
            'galeri' => $galeri->latestGaleri(6),

            // Aparatur
            'pegawai' => $pegawai->featuredPegawai(5),

            // Fasilitas
            'fasilitas' => $fasilitas->featuredFasilitas(3),
        ]);
    }
}