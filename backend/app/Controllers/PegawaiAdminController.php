<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PegawaiModel;

class PegawaiAdminController extends Controller
{
    protected PegawaiModel $pegawai;

    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
    }


    /**
     * =========================================================
     * INDEX
     * =========================================================
     */
    public function index()
    {
        return $this->adminView('pegawai/index', [
            'title'   => 'Pegawai',
            'pegawai' => $this->pegawai->allForAdmin(),
        ]);
    }


    /**
     * =========================================================
     * CREATE
     * =========================================================
     */
    public function create()
    {
        return $this->adminView('pegawai/create', [
            'title' => 'Tambah Pegawai',

            'jabatan' =>
                $this->pegawai->allJabatan(),

            'unit_organisasi' =>
                $this->pegawai->allUnitOrganisasi(),
        ]);
    }


    /**
     * =========================================================
     * STORE
     * =========================================================
     */
    public function store()
    {
        $nama = trim($_POST['nama'] ?? '');

        if ($nama === '') {
            die('Nama pegawai wajib diisi.');
        }

        /*
         * Upload foto
         */
        $foto = $this->uploadFoto();

        $data = [
            'jabatan_id' =>
                (int) ($_POST['jabatan_id'] ?? 0),

            'unit_organisasi_id' =>
                (int) ($_POST['unit_organisasi_id'] ?? 0),

            'nama' =>
                $nama,

            'nip' =>
                trim($_POST['nip'] ?? ''),

            'email' =>
                trim($_POST['email'] ?? ''),

            'telepon' =>
                trim($_POST['telepon'] ?? ''),

            'riwayat_pendidikan' =>
                trim($_POST['riwayat_pendidikan'] ?? ''),

            'foto' =>
                $foto,

            'status' =>
                $_POST['status'] ?? 'aktif',
        ];

        $this->pegawai->createAdmin($data);

        $this->redirect('/superadmin/pegawai');
    }


    /**
     * =========================================================
     * EDIT
     * =========================================================
     */
    public function edit(int $id)
    {
        $pegawai = $this->pegawai->findById($id);

        if (!$pegawai) {
            http_response_code(404);
            echo 'Pegawai tidak ditemukan.';
            return;
        }

        return $this->adminView('pegawai/edit', [
            'title' => 'Edit Pegawai',

            'pegawai' => $pegawai,

            'jabatan' =>
                $this->pegawai->allJabatan(),

            'unit_organisasi' =>
                $this->pegawai->allUnitOrganisasi(),
        ]);
    }


    /**
     * =========================================================
     * UPDATE
     * =========================================================
     */
    public function update(int $id)
    {
        $pegawai = $this->pegawai->findById($id);

        if (!$pegawai) {
            http_response_code(404);
            echo 'Pegawai tidak ditemukan.';
            return;
        }

        /*
         * Gunakan foto lama terlebih dahulu.
         */
        $foto = $pegawai['foto'] ?? null;

        /*
         * Coba upload foto baru.
         *
         * Jika tidak ada foto baru,
         * uploadFoto() akan mengembalikan null.
         */
        $fotoBaru = $this->uploadFoto();

        if ($fotoBaru !== null) {

            /*
             * Hapus foto lama.
             */
            $this->deleteFoto($foto);

            /*
             * Gunakan foto baru.
             */
            $foto = $fotoBaru;
        }

        $data = [
            'jabatan_id' =>
                (int) ($_POST['jabatan_id'] ?? 0),

            'unit_organisasi_id' =>
                (int) ($_POST['unit_organisasi_id'] ?? 0),

            'nama' =>
                trim($_POST['nama'] ?? ''),

            'nip' =>
                trim($_POST['nip'] ?? ''),

            'email' =>
                trim($_POST['email'] ?? ''),

            'telepon' =>
                trim($_POST['telepon'] ?? ''),

            'riwayat_pendidikan' =>
                trim($_POST['riwayat_pendidikan'] ?? ''),

            'foto' =>
                $foto,

            'status' =>
                $_POST['status'] ?? 'aktif',
        ];

        $this->pegawai->updateAdmin($id, $data);

        $this->redirect('/superadmin/pegawai');
    }


    /**
     * =========================================================
     * DELETE
     * =========================================================
     */
    public function delete(int $id)
    {
        $pegawai = $this->pegawai->findById($id);

        if (!$pegawai) {
            http_response_code(404);
            echo 'Pegawai tidak ditemukan.';
            return;
        }

        /*
         * Soft delete database.
         */
        $this->pegawai->softDelete($id);

        /*
         * Hapus file foto.
         */
        $this->deleteFoto(
            $pegawai['foto'] ?? null
        );

        $this->redirect('/superadmin/pegawai');
    }


    /**
     * =========================================================
     * UPLOAD FOTO
     * =========================================================
     */
    private function uploadFoto(): ?string
    {
        /*
         * Pastikan field form bernama "foto".
         */
        if (
            !isset($_FILES['foto']) ||
            $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE
        ) {
            return null;
        }

        /*
         * Cek error upload.
         */
        if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
            die('Upload foto gagal.');
        }

        $file = $_FILES['foto'];

        /*
         * Maksimal 2 MB.
         */
        if ($file['size'] > 2 * 1024 * 1024) {
            die('Ukuran foto maksimal 2 MB.');
        }

        /*
         * Validasi MIME.
         */
        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
        ];

        $finfo = new \finfo(FILEINFO_MIME_TYPE);

        $mime = $finfo->file(
            $file['tmp_name']
        );

        if (!isset($allowedTypes[$mime])) {
            die('Format foto harus JPG, PNG, atau WEBP.');
        }

        $extension = $allowedTypes[$mime];

        /*
         * Folder upload:
         *
         * public/uploads/pegawai
         */
        $uploadDir = PUBLIC_PATH . '/uploads/pegawai';

        if (!is_dir($uploadDir)) {
            mkdir(
                $uploadDir,
                0755,
                true
            );
        }

        /*
         * Nama file unik.
         *
         * Contoh:
         * pegawai_68a123456789_1750000000.jpg
         */
        $filename =
            'pegawai_' .
            uniqid() .
            '_' .
            time() .
            '.' .
            $extension;

        $destination =
            $uploadDir .
            '/' .
            $filename;

        /*
         * Pindahkan file.
         */
        if (!move_uploaded_file(
            $file['tmp_name'],
            $destination
        )) {
            die('Gagal menyimpan foto.');
        }

        /*
         * Simpan path relatif ke database.
         */
        return '/uploads/pegawai/' . $filename;
    }


    /**
     * =========================================================
     * DELETE FOTO
     * =========================================================
     */
    private function deleteFoto(?string $foto): void
    {
        if (empty($foto)) {
            return;
        }

        /*
         * Hilangkan slash di awal.
         */
        $relativePath = ltrim(
            $foto,
            '/'
        );

        /*
         * Pastikan hanya file dalam
         * uploads/pegawai yang boleh dihapus.
         */
        if (
            !str_starts_with(
                $relativePath,
                'uploads/pegawai/'
            )
        ) {
            return;
        }

        $file =
            PUBLIC_PATH .
            '/' .
            $relativePath;

        if (is_file($file)) {
            unlink($file);
        }
    }
}