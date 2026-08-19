<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\FasilitasModel;

class FasilitasAdminController extends Controller
{
    protected FasilitasModel $fasilitasModel;


    public function __construct()
    {
        $this->fasilitasModel = new FasilitasModel();
    }


    /* =========================================================
     * INDEX
     * ========================================================= */

    public function index()
    {
        $fasilitas = $this->fasilitasModel->allForAdmin();

        $this->adminView('fasilitas/index', [
            'title'     => 'Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }


    /* =========================================================
     * CREATE
     * ========================================================= */

    public function create()
    {
        $this->adminView('fasilitas/create', [
            'title' => 'Tambah Fasilitas',
        ]);
    }


    public function store()
    {
        $nama = trim($_POST['nama'] ?? '');

        $deskripsi = trim(
            $_POST['deskripsi'] ?? ''
        );


        if ($nama === '') {

            $_SESSION['error'] =
                'Nama fasilitas wajib diisi.';

            $this->redirect(
                '/superadmin/fasilitas/create'
            );
        }


        $success = $this->fasilitasModel->createAdmin([
            'nama'      => $nama,
            'deskripsi' => $deskripsi,
        ]);


        if (!$success) {

            $_SESSION['error'] =
                'Gagal menambahkan fasilitas.';

            $this->redirect(
                '/superadmin/fasilitas/create'
            );
        }


        $_SESSION['success'] =
            'Fasilitas berhasil ditambahkan.';

        $this->redirect(
            '/superadmin/fasilitas'
        );
    }


    /* =========================================================
     * EDIT
     * ========================================================= */

    public function edit(int $id)
    {
        $fasilitas =
            $this->fasilitasModel->findById($id);


        if (!$fasilitas) {

            http_response_code(404);

            echo 'Fasilitas tidak ditemukan.';

            return;
        }


        $this->adminView('fasilitas/edit', [
            'title'     => 'Edit Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }


    public function update(int $id)
    {
        $fasilitas =
            $this->fasilitasModel->findById($id);


        if (!$fasilitas) {

            http_response_code(404);

            echo 'Fasilitas tidak ditemukan.';

            return;
        }


        $nama = trim($_POST['nama'] ?? '');

        $deskripsi = trim(
            $_POST['deskripsi'] ?? ''
        );


        if ($nama === '') {

            $_SESSION['error'] =
                'Nama fasilitas wajib diisi.';

            $this->redirect(
                "/superadmin/fasilitas/edit/{$id}"
            );
        }


        $success =
            $this->fasilitasModel->updateAdmin(
                $id,
                [
                    'nama'      => $nama,
                    'deskripsi' => $deskripsi,
                ]
            );


        if (!$success) {

            $_SESSION['error'] =
                'Gagal memperbarui fasilitas.';

            $this->redirect(
                "/superadmin/fasilitas/edit/{$id}"
            );
        }


        $_SESSION['success'] =
            'Fasilitas berhasil diperbarui.';

        $this->redirect(
            '/superadmin/fasilitas'
        );
    }


    /* =========================================================
     * DELETE
     * ========================================================= */

    public function delete(int $id)
    {
        $fasilitas =
            $this->fasilitasModel->findById($id);


        if (!$fasilitas) {

            $_SESSION['error'] =
                'Fasilitas tidak ditemukan.';

            $this->redirect(
                '/superadmin/fasilitas'
            );
        }


        $this->fasilitasModel->softDelete($id);


        $_SESSION['success'] =
            'Fasilitas berhasil dihapus.';

        $this->redirect(
            '/superadmin/fasilitas'
        );
    }


    /* =========================================================
     * FOTO
     * ========================================================= */

    public function photos(int $id)
    {
        $fasilitas =
            $this->fasilitasModel->findById($id);


        if (!$fasilitas) {

            http_response_code(404);

            echo 'Fasilitas tidak ditemukan.';

            return;
        }


        $foto =
            $this->fasilitasModel->getFoto($id);


        $this->adminView('fasilitas/foto', [
            'title'     => 'Foto Fasilitas',
            'fasilitas' => $fasilitas,
            'foto'      => $foto,
        ]);
    }


    public function uploadPhoto(int $id)
    {
        $fasilitas =
            $this->fasilitasModel->findById($id);


        if (!$fasilitas) {

            $_SESSION['error'] =
                'Fasilitas tidak ditemukan.';

            $this->redirect(
                '/superadmin/fasilitas'
            );
        }


        if (
            !isset($_FILES['gambar']) ||
            $_FILES['gambar']['error'] !== UPLOAD_ERR_OK
        ) {

            $_SESSION['error'] =
                'Silakan pilih gambar.';

            $this->redirect(
                "/superadmin/fasilitas/{$id}/photos"
            );
        }


        $file = $_FILES['gambar'];


        $allowed = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
        ];


        $mime = mime_content_type(
            $file['tmp_name']
        );


        if (!isset($allowed[$mime])) {

            $_SESSION['error'] =
                'Format gambar tidak didukung.';

            $this->redirect(
                "/superadmin/fasilitas/{$id}/photos"
            );
        }


        if ($file['size'] > 5 * 1024 * 1024) {

            $_SESSION['error'] =
                'Ukuran gambar maksimal 5 MB.';

            $this->redirect(
                "/superadmin/fasilitas/{$id}/photos"
            );
        }


        $extension = $allowed[$mime];


        $filename =
            uniqid('fasilitas_', true)
            . '.'
            . $extension;


        $uploadDir =
            PUBLIC_PATH . '/uploads/fasilitas';


        if (!is_dir($uploadDir)) {

            mkdir(
                $uploadDir,
                0755,
                true
            );
        }


        $destination =
            $uploadDir . '/' . $filename;


        if (
            !move_uploaded_file(
                $file['tmp_name'],
                $destination
            )
        ) {

            $_SESSION['error'] =
                'Gagal menyimpan gambar.';

            $this->redirect(
                "/superadmin/fasilitas/{$id}/photos"
            );
        }


        $path =
            'uploads/fasilitas/' . $filename;


        $this->fasilitasModel->addFoto(
            $id,
            $path
        );


        $_SESSION['success'] =
            'Foto berhasil ditambahkan.';

        $this->redirect(
            "/superadmin/fasilitas/{$id}/photos"
        );
    }


    public function deletePhoto(int $id)
    {
        $foto =
            $this->fasilitasModel->findFoto($id);


        if (!$foto) {

            $_SESSION['error'] =
                'Foto tidak ditemukan.';

            $this->redirect(
                '/superadmin/fasilitas'
            );
        }


        $file =
            PUBLIC_PATH . '/' . ltrim(
                $foto['gambar'],
                '/'
            );


        if (file_exists($file)) {
            unlink($file);
        }


        $this->fasilitasModel->deleteFoto($id);


        $_SESSION['success'] =
            'Foto berhasil dihapus.';


        $this->redirect(
            "/superadmin/fasilitas/{$foto['fasilitas_id']}/photos"
        );
    }
}