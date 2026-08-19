<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\SejarahModel;

class SejarahAdminController extends Controller
{
    protected SejarahModel $sejarah;

    public function __construct()
    {
        $this->sejarah = new SejarahModel();
    }

    /**
     * Halaman edit sejarah
     */
    public function index(): void
    {
        $this->adminView('sejarah/index', [
            'title'   => 'Sejarah Kelurahan',
            'sejarah' => $this->sejarah->getSejarah(),
        ]);
    }

    /**
     * Update sejarah
     */
    public function update(): void
    {
        $sejarah = $this->sejarah->getSejarah();

        if (empty($sejarah['id'])) {

            Flash::error(
                'Data sejarah tidak ditemukan.'
            );

            Response::redirect(
                '/superadmin/sejarah'
            );

            return;
        }

        $id = (int) $sejarah['id'];

        /*
        |--------------------------------------------------------------------------
        | Input
        |--------------------------------------------------------------------------
        */

        $judul = trim(
            (string) Request::input('judul')
        );

        $isi = trim(
            (string) Request::input('isi')
        );

        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        if ($judul === '') {

            Flash::error(
                'Judul sejarah wajib diisi.'
            );

            Response::redirect(
                '/superadmin/sejarah'
            );

            return;
        }

        if ($isi === '') {

            Flash::error(
                'Isi sejarah wajib diisi.'
            );

            Response::redirect(
                '/superadmin/sejarah'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Data
        |--------------------------------------------------------------------------
        */

        $data = [
            'judul' => $judul,
            'isi'   => $isi,
        ];

        /*
        |--------------------------------------------------------------------------
        | Foto 1
        |--------------------------------------------------------------------------
        */

        if (
            isset($_FILES['foto_1']) &&
            $_FILES['foto_1']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $foto1 = $this->uploadImage(
                $_FILES['foto_1'],
                'sejarah-1'
            );

            if ($foto1 === false) {

                Response::redirect(
                    '/superadmin/sejarah'
                );

                return;
            }

            /*
            | Upload baru berhasil,
            | sekarang hapus foto lama.
            */
            if (!empty($sejarah['foto_1'])) {

                $this->deleteFile(
                    $sejarah['foto_1']
                );
            }

            $data['foto_1'] = $foto1;
        }

        /*
        |--------------------------------------------------------------------------
        | Foto 2
        |--------------------------------------------------------------------------
        */

        if (
            isset($_FILES['foto_2']) &&
            $_FILES['foto_2']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $foto2 = $this->uploadImage(
                $_FILES['foto_2'],
                'sejarah-2'
            );

            if ($foto2 === false) {

                Response::redirect(
                    '/superadmin/sejarah'
                );

                return;
            }

            /*
            | Upload baru berhasil,
            | sekarang hapus foto lama.
            */
            if (!empty($sejarah['foto_2'])) {

                $this->deleteFile(
                    $sejarah['foto_2']
                );
            }

            $data['foto_2'] = $foto2;
        }

        /*
        |--------------------------------------------------------------------------
        | Update database
        |--------------------------------------------------------------------------
        */

        $success = $this->sejarah->update(
            $id,
            $data
        );

        if (!$success) {

            Flash::error(
                'Gagal memperbarui sejarah.'
            );

            Response::redirect(
                '/superadmin/sejarah'
            );

            return;
        }

        Flash::success(
            'Sejarah Kelurahan berhasil diperbarui.'
        );

        Response::redirect(
            '/superadmin/sejarah'
        );
    }

    /**
     * Upload gambar sejarah
     */
    private function uploadImage(
        array $file,
        string $prefix
    ): string|false {

        if ($file['error'] !== UPLOAD_ERR_OK) {

            Flash::error(
                'Gagal mengunggah gambar.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Maksimal 2 MB
        |--------------------------------------------------------------------------
        */

        if ($file['size'] > 2 * 1024 * 1024) {

            Flash::error(
                'Ukuran gambar maksimal 2 MB.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Format
        |--------------------------------------------------------------------------
        */

        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'webp',
        ];

        $extension = strtolower(
            pathinfo(
                $file['name'],
                PATHINFO_EXTENSION
            )
        );

        if (!in_array(
            $extension,
            $allowedExtensions,
            true
        )) {

            Flash::error(
                'Format gambar harus JPG, JPEG, PNG, atau WEBP.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Folder
        |--------------------------------------------------------------------------
        */

        $uploadDirectory =
            PUBLIC_PATH . '/uploads/sejarah';

        if (!is_dir($uploadDirectory)) {

            mkdir(
                $uploadDirectory,
                0755,
                true
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Nama file
        |--------------------------------------------------------------------------
        */

        $filename =
            $prefix .
            '-' .
            time() .
            '-' .
            bin2hex(random_bytes(4)) .
            '.' .
            $extension;

        $destination =
            $uploadDirectory .
            '/' .
            $filename;

        /*
        |--------------------------------------------------------------------------
        | Simpan
        |--------------------------------------------------------------------------
        */

        if (!move_uploaded_file(
            $file['tmp_name'],
            $destination
        )) {

            Flash::error(
                'Gagal menyimpan gambar.'
            );

            return false;
        }

        return 'uploads/sejarah/' . $filename;
    }

    /**
     * Hapus file lama
     */
    private function deleteFile(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        $fullPath =
            PUBLIC_PATH .
            '/' .
            ltrim($path, '/');

        /*
        | Keamanan:
        | hanya boleh menghapus file di dalam public/
        */
        if (
            is_file($fullPath) &&
            str_starts_with(
                realpath($fullPath) ?: '',
                realpath(PUBLIC_PATH) ?: ''
            )
        ) {
            @unlink($fullPath);
        }
    }
}