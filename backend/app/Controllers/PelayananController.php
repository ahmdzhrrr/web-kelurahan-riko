<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PelayananModel;
use App\Models\SettingModel;
use App\Models\KontakModel;

class PelayananController extends Controller
{
    public function index()
    {
        $setting = new SettingModel();
        $kontak = new KontakModel();
        $pelayanan = new PelayananModel();

        $this->view('pelayanan/index', [
            'setting'   => $setting->getSetting(),
            'kontak'    => $kontak->getKontak(),
            'pelayanan' => $pelayanan->allPelayanan(),
        ]);
    }

    public function detail(string $slug)
    {
        $setting = new SettingModel();
        $kontak = new KontakModel();
        $pelayananModel = new PelayananModel();

        $pelayanan = $pelayananModel->getBySlug($slug);

        if (!$pelayanan) {
            http_response_code(404);
            echo "Pelayanan tidak ditemukan.";
            return;
        }

        $persyaratan = $pelayananModel->getPersyaratan(
            (int) $pelayanan['id']
        );

        $this->view('pelayanan/detail', [
            'setting'     => $setting->getSetting(),
            'kontak'      => $kontak->getKontak(),
            'pelayanan'   => $pelayanan,
            'persyaratan' => $persyaratan,
        ]);
    }
}