<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\BeritaModel;
use App\Models\SettingModel;
use App\Models\KontakModel;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaModel = new BeritaModel();
        $setting = new SettingModel();
        $kontak = new KontakModel();

        $this->view('berita/index', [

            'setting' => $setting->getSetting(),
            'kontak' => $kontak->getKontak(),
            'berita' => $beritaModel->published(),

        ]);
    }


    public function detail(string $slug)
    {
        $beritaModel = new BeritaModel();

        $berita = $beritaModel->getBySlug($slug);

        if (!$berita) {

            http_response_code(404);

            echo "Berita tidak ditemukan.";

            return;
        }

        $setting = new SettingModel();
        $kontak = new KontakModel();

        $this->view('berita/detail', [

            'setting' => $setting->getSetting(),
            'kontak' => $kontak->getKontak(),
            'berita' => $berita,

        ]);
    }
}