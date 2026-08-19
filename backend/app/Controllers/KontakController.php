<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\KontakModel;

class KontakController extends Controller
{
    protected KontakModel $kontak;

    public function __construct()
    {
        $this->kontak = new KontakModel();
    }

    /**
     * Halaman pengaturan kontak
     */
    public function index(): void
    {
        $kontak = $this->kontak->getKontak();

        $this->adminView('kontak/index', [
            'title'  => 'Kontak Kelurahan',
            'kontak' => $kontak,
        ]);
    }

    /**
     * Update kontak
     */
    public function update(): void
    {
        $kontak = $this->kontak->getKontak();

        if (empty($kontak['id'])) {
            Flash::error('Data kontak tidak ditemukan.');
            Response::redirect('/superadmin/kontak');
        }

        $id = (int) $kontak['id'];

        $email = trim(
            (string) Request::input('email')
        );

        /*
        |--------------------------------------------------------------------------
        | Validasi email
        |--------------------------------------------------------------------------
        */

        if (
            $email !== '' &&
            !filter_var($email, FILTER_VALIDATE_EMAIL)
        ) {
            Flash::error('Format email tidak valid.');
            Response::redirect('/superadmin/kontak');
        }


        /*
        |--------------------------------------------------------------------------
        | Data kontak
        |--------------------------------------------------------------------------
        */

        $data = [
            'alamat'          => trim((string) Request::input('alamat')),
            'email'           => $email !== '' ? $email : null,
            'telepon'         => trim((string) Request::input('telepon')),
            'whatsapp'        => trim((string) Request::input('whatsapp')),
            'maps'            => trim((string) Request::input('maps')),
            'jam_operasional' => trim((string) Request::input('jam_operasional')),
            'instagram'       => trim((string) Request::input('instagram')),
            'facebook'        => trim((string) Request::input('facebook')),
            'youtube'         => trim((string) Request::input('youtube')),
            'tiktok'          => trim((string) Request::input('tiktok')),
            'website'         => trim((string) Request::input('website')),
        ];


        /*
        |--------------------------------------------------------------------------
        | Latitude
        |--------------------------------------------------------------------------
        */

        $latitude = trim(
            (string) Request::input('latitude')
        );

        if ($latitude === '') {

            $data['latitude'] = null;

        } elseif (is_numeric($latitude)) {

            $latitudeValue = (float) $latitude;

            if ($latitudeValue < -90 || $latitudeValue > 90) {
                Flash::error(
                    'Latitude harus berada antara -90 sampai 90.'
                );

                Response::redirect('/superadmin/kontak');
            }

            $data['latitude'] = $latitudeValue;

        } else {

            Flash::error('Latitude harus berupa angka.');
            Response::redirect('/superadmin/kontak');
        }


        /*
        |--------------------------------------------------------------------------
        | Longitude
        |--------------------------------------------------------------------------
        */

        $longitude = trim(
            (string) Request::input('longitude')
        );

        if ($longitude === '') {

            $data['longitude'] = null;

        } elseif (is_numeric($longitude)) {

            $longitudeValue = (float) $longitude;

            if ($longitudeValue < -180 || $longitudeValue > 180) {
                Flash::error(
                    'Longitude harus berada antara -180 sampai 180.'
                );

                Response::redirect('/superadmin/kontak');
            }

            $data['longitude'] = $longitudeValue;

        } else {

            Flash::error('Longitude harus berupa angka.');
            Response::redirect('/superadmin/kontak');
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan
        |--------------------------------------------------------------------------
        */

        $success = $this->kontak->update(
            $id,
            $data
        );

        if (!$success) {
            Flash::error(
                'Gagal memperbarui informasi kontak.'
            );

            Response::redirect('/superadmin/kontak');
        }

        Flash::success(
            'Informasi kontak berhasil diperbarui.'
        );

        Response::redirect('/superadmin/kontak');
    }
}