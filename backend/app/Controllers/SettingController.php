<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\SettingModel;

class SettingController extends Controller
{
    protected SettingModel $setting;

    public function __construct()
    {
        $this->setting = new SettingModel();
    }

    /**
     * Halaman pengaturan website
     */
    public function index(): void
    {
        $setting = $this->setting->getSetting();

        $this->adminView('settings/index', [
            'title'   => 'Pengaturan Website',
            'setting' => $setting,
        ]);
    }


    /**
     * Update pengaturan website
     */
    public function update(): void
    {
        $setting = $this->setting->getSetting();

        if (empty($setting['id'])) {
            Flash::error('Data pengaturan website tidak ditemukan.');
            Response::redirect('/superadmin/settings');
        }

        $id = (int) $setting['id'];


        /*
        |--------------------------------------------------------------------------
        | Data teks
        |--------------------------------------------------------------------------
        */

        $data = [
            'site_name'         => trim((string) Request::input('site_name')),
            'site_subtitle'     => trim((string) Request::input('site_subtitle')),
            'tagline'           => trim((string) Request::input('tagline')),
            'hero_title'        => trim((string) Request::input('hero_title')),
            'hero_subtitle'     => trim((string) Request::input('hero_subtitle')),
            'footer'            => trim((string) Request::input('footer')),
            'copyright'         => trim((string) Request::input('copyright')),
            'meta_title'        => trim((string) Request::input('meta_title')),
            'meta_description'  => trim((string) Request::input('meta_description')),
            'meta_keywords'     => trim((string) Request::input('meta_keywords')),
            'kecamatan'         => trim((string) Request::input('kecamatan')),
            'tipologi'          => trim((string) Request::input('tipologi')),
            'maintenance_mode'  => isset($_POST['maintenance_mode']) ? 1 : 0,
        ];


        /*
        |--------------------------------------------------------------------------
        | Luas Wilayah
        |--------------------------------------------------------------------------
        */

        $luasWilayah = trim(
            (string) Request::input('luas_wilayah')
        );

        if ($luasWilayah === '') {

            $data['luas_wilayah'] = null;

        } elseif (is_numeric($luasWilayah)) {

            $data['luas_wilayah'] = (float) $luasWilayah;

        } else {

            Flash::error('Luas wilayah harus berupa angka.');

            Response::redirect('/superadmin/settings');
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if (
            isset($_FILES['logo']) &&
            $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $logo = $this->uploadImage(
                $_FILES['logo'],
                'logo'
            );

            if ($logo === false) {
                Response::redirect('/superadmin/settings');
            }

            $data['logo'] = $logo;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Favicon
        |--------------------------------------------------------------------------
        */

        if (
            isset($_FILES['favicon']) &&
            $_FILES['favicon']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $favicon = $this->uploadImage(
                $_FILES['favicon'],
                'favicon'
            );

            if ($favicon === false) {
                Response::redirect('/superadmin/settings');
            }

            $data['favicon'] = $favicon;
        }


        /*
        |--------------------------------------------------------------------------
        | Update database
        |--------------------------------------------------------------------------
        */

        $success = $this->setting->update($id, $data);

        if (!$success) {

            Flash::error(
                'Gagal menyimpan pengaturan website.'
            );

            Response::redirect('/superadmin/settings');
        }


        Flash::success(
            'Pengaturan website berhasil diperbarui.'
        );

        Response::redirect('/superadmin/settings');
    }


    /**
     * Upload gambar ke public/uploads/settings
     */
    private function uploadImage(
        array $file,
        string $prefix
    ): string|false {

        if ($file['error'] !== UPLOAD_ERR_OK) {

            Flash::error(
                'Gagal mengunggah file.'
            );

            return false;
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi ukuran
        |--------------------------------------------------------------------------
        */

        $maxSize = 2 * 1024 * 1024;

        if ($file['size'] > $maxSize) {

            Flash::error(
                'Ukuran gambar maksimal 2 MB.'
            );

            return false;
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi ekstensi
        |--------------------------------------------------------------------------
        */

        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'webp',
            'ico'
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
        | Folder upload
        |--------------------------------------------------------------------------
        */

        $uploadDirectory =
            PUBLIC_PATH . '/uploads/settings';


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
        | Pindahkan file
        |--------------------------------------------------------------------------
        */

        if (!move_uploaded_file(
            $file['tmp_name'],
            $destination
        )) {

            Flash::error(
                'Gagal menyimpan file gambar.'
            );

            return false;
        }


        /*
        |--------------------------------------------------------------------------
        | Path yang disimpan ke database
        |--------------------------------------------------------------------------
        */

        return 'uploads/settings/' . $filename;
    }
}