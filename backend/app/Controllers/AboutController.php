<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ProfilModel;
use App\Models\VisiMisiModel;
use App\Models\SettingModel;
use App\Models\KontakModel;
use App\Models\SejarahModel;

class AboutController extends Controller
{
    public function profil()
    {
        $profil = new ProfilModel();
        $setting = new SettingModel();
        $kontak = new KontakModel();

        $this->view('profil', [
            'setting' => $setting->getSetting(),
            'kontak'  => $kontak->getKontak(),
            'profil'  => $profil->getProfil(),
        ]);
    }

    public function visiMisi()
    {
        $visiMisi = new VisiMisiModel();
        $setting = new SettingModel();
        $kontak = new KontakModel();

        $this->view('visi-misi', [
            'setting' => $setting->getSetting(),
            'kontak'  => $kontak->getKontak(),
            'visi'    => $visiMisi->getVisi(),
            'misi'    => $visiMisi->getMisi(),
        ]);
    }

    public function sejarah()
{
    $sejarah = new SejarahModel();
    $setting = new SettingModel();
    $kontak = new KontakModel();

    $this->view('sejarah', [
        'setting' => $setting->getSetting(),
        'kontak'  => $kontak->getKontak(),
        'sejarah' => $sejarah->getSejarah(),
    ]);
}
}