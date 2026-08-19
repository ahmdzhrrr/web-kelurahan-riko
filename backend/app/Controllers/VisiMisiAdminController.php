<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\VisiMisiModel;

class VisiMisiAdminController extends Controller
{
    protected VisiMisiModel $visiMisi;

    public function __construct()
    {
        $this->visiMisi = new VisiMisiModel();
    }

    /**
     * Halaman edit visi & misi
     */
    public function index(): void
    {
        $this->adminView('visi-misi/index', [
            'title' => 'Visi & Misi',
            'visi'  => $this->visiMisi->getVisi(),
            'misi'  => $this->visiMisi->getMisi(),
        ]);
    }

    /**
     * Update visi
     */
    public function updateVisi(): void
    {
        $visi = $this->visiMisi->getVisi();

        if (empty($visi['id'])) {
            Flash::error('Data visi tidak ditemukan.');
            Response::redirect('/superadmin/visi-misi');
        }

        $isi = trim(
            (string) Request::input('visi')
        );

        if ($isi === '') {
            Flash::error('Isi visi wajib diisi.');
            Response::redirect('/superadmin/visi-misi');
        }

        $success = $this->visiMisi->update(
            (int) $visi['id'],
            [
                'isi' => $isi
            ]
        );

        if (!$success) {
            Flash::error('Gagal memperbarui visi.');
            Response::redirect('/superadmin/visi-misi');
        }

        Flash::success('Visi berhasil diperbarui.');
        Response::redirect('/superadmin/visi-misi');
    }

    /**
     * Update semua misi
     */
    public function updateMisi(): void
    {
        $misiInput = $_POST['misi'] ?? [];

        if (!is_array($misiInput) || empty($misiInput)) {
            Flash::error('Tidak ada data misi yang dikirim.');
            Response::redirect('/superadmin/visi-misi');
        }

        foreach ($misiInput as $id => $isi) {

            $id = (int) $id;

            $isi = trim((string) $isi);

            /*
             * Abaikan ID tidak valid
             */
            if ($id <= 0) {
                continue;
            }

            /*
             * Jangan simpan misi kosong
             */
            if ($isi === '') {
                continue;
            }

            $this->visiMisi->update(
                $id,
                [
                    'isi' => $isi
                ]
            );
        }

        Flash::success('Misi berhasil diperbarui.');
        Response::redirect('/superadmin/visi-misi');
    }
}