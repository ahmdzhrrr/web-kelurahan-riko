<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\GaleriModel;
use App\Models\AlbumGaleriModel;
use App\Models\SettingModel;
use App\Models\KontakModel;

class GaleriController extends Controller
{
    protected GaleriModel $galeriModel;
    protected AlbumGaleriModel $albumModel;
    protected KontakModel $kontak;
    protected SettingModel $setting;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
        $this->albumModel = new AlbumGaleriModel();

        $this->kontak = new KontakModel();
        $this->setting = new SettingModel();
    }

    /**
     * Halaman daftar album
     *
     * URL:
     * /galeri
     */
    public function index()
    {
        $album = $this->albumModel->allAlbum();

        return $this->view('galeri/index', [
            'album'   => $album,
            'setting' => $this->setting->getSetting(),
            'kontak'  => $this->kontak->getKontak(),
        ]);
    }

    /**
     * Halaman isi album
     *
     * URL:
     * /galeri/{slug}
     */
    public function album(string $slug)
    {
        $album = $this->albumModel->getBySlug($slug);

        if (!$album) {
            http_response_code(404);

            throw new \Exception('Album galeri tidak ditemukan.');
        }

        $galeri = $this->galeriModel->getByAlbum(
            (int) $album['id']
        );

        return $this->view('galeri/album', [
            'album'   => $album,
            'galeri'  => $galeri,
            'setting' => $this->setting->getSetting(),
            'kontak'  => $this->kontak->getKontak(),
        ]);
    }
}