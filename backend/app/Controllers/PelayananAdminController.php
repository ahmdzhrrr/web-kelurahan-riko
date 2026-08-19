<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\PelayananModel;
use App\Models\PersyaratanPelayananModel;

class PelayananAdminController extends Controller
{
    protected PelayananModel $pelayanan;

    protected PersyaratanPelayananModel $persyaratan;

    public function __construct()
    {
        $this->pelayanan = new PelayananModel();
        $this->persyaratan = new PersyaratanPelayananModel();
    }

    /**
     * Daftar pelayanan
     */
    public function index(): void
    {
        $this->adminView('pelayanan/index', [
            'title' => 'Pelayanan',
            'pelayanan' => $this->pelayanan->allPelayanan(),
        ]);
    }

    /**
     * Form tambah
     */
    public function create(): void
    {
        $this->adminView('pelayanan/create', [
            'title' => 'Tambah Pelayanan',
        ]);
    }

    /**
     * Simpan pelayanan baru
     */
    public function store(): void
    {
        $nama = trim(
            (string) Request::input('nama')
        );

        $slugInput = trim(
            (string) Request::input('slug')
        );

        $deskripsi = trim(
            (string) Request::input('deskripsi')
        );

        $jamPelayanan = trim(
            (string) Request::input('jam_pelayanan')
        );

        $link = trim(
            (string) Request::input('link')
        );

        $icon = trim(
            (string) Request::input('icon')
        );

        if ($nama === '') {
            Flash::error('Nama pelayanan wajib diisi.');
            Response::redirect('/superadmin/pelayanan/create');
        }

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $slugInput !== ''
            ? $this->slugify($slugInput)
            : $this->slugify($nama);

        $slug = $this->makeUniqueSlug($slug);

        /*
        |--------------------------------------------------------------------------
        | Insert
        |--------------------------------------------------------------------------
        */

        $id = $this->pelayanan->create([
            'nama'            => $nama,
            'slug'            => $slug,
            'deskripsi'       => $deskripsi !== '' ? $deskripsi : null,
            'jam_pelayanan'   => $jamPelayanan !== '' ? $jamPelayanan : null,
            'link'            => $link !== '' ? $link : null,
            'icon'            => $icon !== '' ? $icon : null,
        ]);

        if ($id === false) {
            Flash::error(
                'Gagal menambahkan pelayanan.'
            );

            Response::redirect('/superadmin/pelayanan/create');
        }

        Flash::success(
            'Pelayanan berhasil ditambahkan.'
        );

        Response::redirect('/superadmin/pelayanan');
    }

    /**
     * Form edit
     */
    public function edit(int $id): void
    {
        $pelayanan = $this->pelayanan->getByIdAdmin($id);

        if (!$pelayanan) {
            Flash::error('Pelayanan tidak ditemukan.');
            Response::redirect('/superadmin/pelayanan');
        }

        $persyaratan = $this->persyaratan
            ->allByPelayanan($id);

        $this->adminView('pelayanan/edit', [
            'title'       => 'Edit Pelayanan',
            'pelayanan'   => $pelayanan,
            'persyaratan' => $persyaratan,
        ]);
    }

    /**
     * Update pelayanan
     */
    public function update(int $id): void
    {
        $pelayanan = $this->pelayanan->getByIdAdmin($id);

        if (!$pelayanan) {
            Flash::error('Pelayanan tidak ditemukan.');
            Response::redirect('/superadmin/pelayanan');
        }

        $nama = trim(
            (string) Request::input('nama')
        );

        $slugInput = trim(
            (string) Request::input('slug')
        );

        $deskripsi = trim(
            (string) Request::input('deskripsi')
        );

        $jamPelayanan = trim(
            (string) Request::input('jam_pelayanan')
        );

        $link = trim(
            (string) Request::input('link')
        );

        $icon = trim(
            (string) Request::input('icon')
        );

        if ($nama === '') {
            Flash::error('Nama pelayanan wajib diisi.');
            Response::redirect(
                "/superadmin/pelayanan/edit/{$id}"
            );
        }

        $slug = $slugInput !== ''
            ? $this->slugify($slugInput)
            : $this->slugify($nama);

        $slug = $this->makeUniqueSlug($slug, $id);

        $success = $this->pelayanan->update(
            $id,
            [
                'nama'          => $nama,
                'slug'          => $slug,
                'deskripsi'     => $deskripsi !== '' ? $deskripsi : null,
                'jam_pelayanan' => $jamPelayanan !== '' ? $jamPelayanan : null,
                'link'          => $link !== '' ? $link : null,
                'icon'          => $icon !== '' ? $icon : null,
            ]
        );

        if (!$success) {
            Flash::error(
                'Gagal memperbarui pelayanan.'
            );

            Response::redirect(
                "/superadmin/pelayanan/edit/{$id}"
            );
        }

        Flash::success(
            'Pelayanan berhasil diperbarui.'
        );

        Response::redirect(
            "/superadmin/pelayanan/edit/{$id}"
        );
    }

    /**
     * Hapus pelayanan secara soft delete
     */
    public function delete(int $id): void
    {
        $pelayanan = $this->pelayanan->getByIdAdmin($id);

        if (!$pelayanan) {
            Flash::error('Pelayanan tidak ditemukan.');
            Response::redirect('/superadmin/pelayanan');
        }

        if (!$this->pelayanan->deleteSoft($id)) {
            Flash::error(
                'Gagal menghapus pelayanan.'
            );

            Response::redirect('/superadmin/pelayanan');
        }

        /*
         * Hapus persyaratan yang berhubungan
         */
        $this->persyaratan
            ->deleteByPelayanan($id);

        Flash::success(
            'Pelayanan berhasil dihapus.'
        );

        Response::redirect('/superadmin/pelayanan');
    }

    /**
     * Tambah persyaratan
     */
    public function storePersyaratan(int $pelayananId): void
    {
        $pelayanan =
            $this->pelayanan->getByIdAdmin($pelayananId);

        if (!$pelayanan) {
            Flash::error('Pelayanan tidak ditemukan.');
            Response::redirect('/superadmin/pelayanan');
        }

        $persyaratan = trim(
            (string) Request::input('persyaratan')
        );

        $urutan = (int) (
            Request::input('urutan') ?: 1
        );

        if ($persyaratan === '') {
            Flash::error(
                'Persyaratan wajib diisi.'
            );

            Response::redirect(
                "/superadmin/pelayanan/edit/{$pelayananId}"
            );
        }

        $result = $this->persyaratan->create([
            'pelayanan_id' => $pelayananId,
            'persyaratan'   => $persyaratan,
            'urutan'        => max(1, $urutan),
        ]);

        if ($result === false) {
            Flash::error(
                'Gagal menambahkan persyaratan.'
            );

            Response::redirect(
                "/superadmin/pelayanan/edit/{$pelayananId}"
            );
        }

        Flash::success(
            'Persyaratan berhasil ditambahkan.'
        );

        Response::redirect(
            "/superadmin/pelayanan/edit/{$pelayananId}"
        );
    }

    /**
     * Update persyaratan
     */
    public function updatePersyaratan(int $id): void
    {
        $item = $this->persyaratan->getById($id);

        if (!$item) {
            Flash::error(
                'Persyaratan tidak ditemukan.'
            );

            Response::redirect('/superadmin/pelayanan');
        }

        $persyaratan = trim(
            (string) Request::input('persyaratan')
        );

        $urutan = (int) (
            Request::input('urutan') ?: 1
        );

        if ($persyaratan === '') {
            Flash::error(
                'Persyaratan wajib diisi.'
            );

            Response::redirect(
                "/superadmin/pelayanan/edit/{$item['pelayanan_id']}"
            );
        }

        $success = $this->persyaratan->update(
            $id,
            [
                'persyaratan' => $persyaratan,
                'urutan'      => max(1, $urutan),
            ]
        );

        if (!$success) {
            Flash::error(
                'Gagal memperbarui persyaratan.'
            );
        } else {
            Flash::success(
                'Persyaratan berhasil diperbarui.'
            );
        }

        Response::redirect(
            "/superadmin/pelayanan/edit/{$item['pelayanan_id']}"
        );
    }

    /**
     * Hapus persyaratan
     */
    public function deletePersyaratan(int $id): void
    {
        $item = $this->persyaratan->getById($id);

        if (!$item) {
            Flash::error(
                'Persyaratan tidak ditemukan.'
            );

            Response::redirect('/superadmin/pelayanan');
        }

        $pelayananId = (int) $item['pelayanan_id'];

        $success = $this->persyaratan
            ->deleteById($id);

        if (!$success) {
            Flash::error(
                'Gagal menghapus persyaratan.'
            );
        } else {
            Flash::success(
                'Persyaratan berhasil dihapus.'
            );
        }

        Response::redirect(
            "/superadmin/pelayanan/edit/{$pelayananId}"
        );
    }

    /**
     * Membuat slug
     */
    private function slugify(string $value): string
    {
        $value = strtolower(trim($value));

        $value = preg_replace(
            '/[^a-z0-9]+/',
            '-',
            $value
        );

        $value = trim(
            $value ?? '',
            '-'
        );

        return $value !== ''
            ? $value
            : 'pelayanan';
    }

    /**
     * Pastikan slug unik
     */
    private function makeUniqueSlug(
        string $slug,
        ?int $ignoreId = null
    ): string {

        $baseSlug = $slug;
        $counter = 1;

        while (true) {

            $sql = "
                SELECT id
                FROM pelayanan
                WHERE slug = ?
                  AND deleted_at IS NULL
            ";

            if ($ignoreId !== null) {
                $sql .= " AND id != ?";
            }

            $sql .= " LIMIT 1";

            $stmt = $this->pelayanan
                ->getDatabase()
                ->prepare($sql);

            if ($ignoreId !== null) {

                $stmt->bind_param(
                    'si',
                    $slug,
                    $ignoreId
                );

            } else {

                $stmt->bind_param(
                    's',
                    $slug
                );
            }

            $stmt->execute();

            $exists = $stmt
                ->get_result()
                ->fetch_assoc();

            if (!$exists) {
                return $slug;
            }

            $counter++;

            $slug = $baseSlug . '-' . $counter;
        }
    }
}