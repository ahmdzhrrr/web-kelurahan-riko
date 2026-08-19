<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\FasilitasModel;
use App\Models\SettingModel;
use App\Models\KontakModel;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitasModel = new FasilitasModel();
        $setting = new SettingModel();
        $kontak = new KontakModel();

        $this->view('fasilitas/index', [
            'setting'   => $setting->getSetting(),
            'kontak'    => $kontak->getKontak(),
            'fasilitas' => $fasilitasModel->allFasilitas(),
        ]);
    }
}