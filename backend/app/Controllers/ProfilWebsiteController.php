<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\ProfilModel;

class ProfilWebsiteController extends Controller
{
    protected ProfilModel $profil;

    public function __construct()
    {
        $this->profil = new ProfilModel();
    }

    /**
     * Halaman edit profil kelurahan
     */
    public function index(): void
    {
        $profil = $this->profil->getProfil();

        $this->adminView('profil-website/index', [
            'title'  => 'Profil Kelurahan',
            'profil' => $profil,
        ]);
    }

    /**
     * Update profil kelurahan
     */
    public function update(): void
    {
        $profil = $this->profil->getProfil();

        if (empty($profil['id'])) {
            Flash::error(
                'Data profil kelurahan tidak ditemukan.'
            );

            Response::redirect(
                '/superadmin/profil-website'
            );

            return;
        }

        $id = (int) $profil['id'];

        /*
        |--------------------------------------------------------------------------
        | Ambil input
        |--------------------------------------------------------------------------
        */

        $judul = trim(
            (string) Request::input('judul')
        );

        $isi = trim(
            (string) Request::input('isi')
        );

        $videoUrl = trim(
            (string) Request::input('video_url')
        );

        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        if ($judul === '') {
            Flash::error(
                'Judul profil wajib diisi.'
            );

            Response::redirect(
                '/superadmin/profil-website'
            );

            return;
        }

        if ($isi === '') {
            Flash::error(
                'Isi profil wajib diisi.'
            );

            Response::redirect(
                '/superadmin/profil-website'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Data dasar
        |--------------------------------------------------------------------------
        */

        $data = [
            'judul' => $judul,
            'isi'   => $isi,
        ];

        /*
        |--------------------------------------------------------------------------
        | Upload gambar profil
        |--------------------------------------------------------------------------
        */

        if (
            isset($_FILES['gambar']) &&
            $_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $gambar = $this->uploadImage(
                $_FILES['gambar']
            );

            if ($gambar === false) {
                Response::redirect(
                    '/superadmin/profil-website'
                );

                return;
            }

            /*
            | Hapus gambar lama setelah upload baru berhasil
            */
            if (!empty($profil['gambar'])) {
                $this->deleteFile(
                    $profil['gambar']
                );
            }

            $data['gambar'] = $gambar;
        }

        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        |
        | Jika URL YouTube diisi:
        | - simpan ke video_url
        | - video_file dikosongkan
        | - file MP4 lama dihapus
        |
        | Jika tidak ada URL tetapi upload MP4:
        | - simpan ke video_file
        | - video_url dikosongkan
        |
        | Jika keduanya kosong:
        | - hapus video lama
        | - kedua kolom menjadi NULL
        |
        |--------------------------------------------------------------------------
        */

        $hasNewVideoFile =
            isset($_FILES['video_file']) &&
            $_FILES['video_file']['error'] !== UPLOAD_ERR_NO_FILE;

        /*
        |--------------------------------------------------------------------------
        | Kasus 1: YouTube
        |--------------------------------------------------------------------------
        */

        if ($videoUrl !== '') {

            /*
            | Hapus video MP4 lama
            */
            if (!empty($profil['video_file'])) {
                $this->deleteFile(
                    $profil['video_file']
                );
            }

            $data['video_url'] = $videoUrl;
            $data['video_file'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Kasus 2: Upload MP4
        |--------------------------------------------------------------------------
        */

        elseif ($hasNewVideoFile) {

            $videoFile = $this->uploadVideo(
                $_FILES['video_file']
            );

            if ($videoFile === false) {
                Response::redirect(
                    '/superadmin/profil-website'
                );

                return;
            }

            /*
            | Hapus MP4 lama setelah upload baru berhasil
            */
            if (!empty($profil['video_file'])) {
                $this->deleteFile(
                    $profil['video_file']
                );
            }

            $data['video_file'] = $videoFile;
            $data['video_url'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Kasus 3: Tidak ada video baru
        |--------------------------------------------------------------------------
        |
        | Kalau user tidak mengisi URL dan tidak upload video,
        | video lama TETAP dipertahankan.
        |
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | Update database
        |--------------------------------------------------------------------------
        */

        $success = $this->profil->update(
            $id,
            $data
        );

        if (!$success) {

            Flash::error(
                'Gagal memperbarui profil kelurahan.'
            );

            Response::redirect(
                '/superadmin/profil-website'
            );

            return;
        }

        Flash::success(
            'Profil Kelurahan berhasil diperbarui.'
        );

        Response::redirect(
            '/superadmin/profil-website'
        );
    }

    /**
     * Upload gambar profil
     */
    private function uploadImage(array $file): string|false
    {
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
                'Format gambar tidak didukung.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Folder
        |--------------------------------------------------------------------------
        */

        $uploadDirectory =
            PUBLIC_PATH . '/uploads/profil';

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
            'profil-' .
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

        return 'uploads/profil/' . $filename;
    }

    /**
     * Upload video MP4
     */
    private function uploadVideo(array $file): string|false
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {

            Flash::error(
                'Gagal mengunggah video.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Maksimal 50 MB
        |--------------------------------------------------------------------------
        */

        if ($file['size'] > 50 * 1024 * 1024) {

            Flash::error(
                'Ukuran video maksimal 50 MB.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Format MP4
        |--------------------------------------------------------------------------
        */

        $extension = strtolower(
            pathinfo(
                $file['name'],
                PATHINFO_EXTENSION
            )
        );

        if ($extension !== 'mp4') {

            Flash::error(
                'Format video harus MP4.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi MIME
        |--------------------------------------------------------------------------
        */

        $allowedMimeTypes = [
            'video/mp4',
            'application/mp4',
        ];

        if (
            !empty($file['type']) &&
            !in_array(
                $file['type'],
                $allowedMimeTypes,
                true
            )
        ) {

            Flash::error(
                'File yang diunggah bukan video MP4 yang valid.'
            );

            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Folder
        |--------------------------------------------------------------------------
        */

        $uploadDirectory =
            PUBLIC_PATH . '/uploads/video';

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
            'profil-video-' .
            time() .
            '-' .
            bin2hex(random_bytes(4)) .
            '.mp4';

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
                'Gagal menyimpan video.'
            );

            return false;
        }

        return 'uploads/video/' . $filename;
    }

    /**
     * Hapus file lama
     */
    private function deleteFile(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        /*
        | Jangan pernah menghapus file di luar public/
        */
        $fullPath =
            PUBLIC_PATH .
            '/' .
            ltrim($path, '/');

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