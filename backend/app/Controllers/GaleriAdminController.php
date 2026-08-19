<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\GaleriModel;
use App\Models\AlbumGaleriModel;

class GaleriAdminController extends Controller
{
    protected GaleriModel $galeriModel;
    protected AlbumGaleriModel $albumModel;


    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
        $this->albumModel = new AlbumGaleriModel();
    }


    /* =========================================================
     * ALBUM
     * ========================================================= */

    /**
     * Daftar album
     */
    public function index()
    {
        $album = $this->albumModel->allAlbum();

        $this->adminView('galeri/index', [
            'title' => 'Galeri',
            'album' => $album,
        ]);
    }


    /**
     * Form tambah album
     */
    public function create()
    {
        $this->adminView('galeri/create', [
            'title' => 'Tambah Album',
        ]);
    }


    /**
     * Simpan album
     */
    public function store()
    {
        $nama = trim($_POST['nama'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');

        if ($nama === '') {
            $this->redirect('/superadmin/galeri/create');
        }

        if ($slug === '') {
            $slug = $this->slugify($nama);
        }

        $cover = $this->uploadCover();

        $this->albumModel->createAdmin([
            'nama' => $nama,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'cover' => $cover,
        ]);

        $this->redirect('/superadmin/galeri');
    }


    /**
     * Form edit album
     */
    public function edit(int $id)
    {
        $album = $this->albumModel->findById($id);

        if (!$album) {
            http_response_code(404);
            echo "Album tidak ditemukan.";
            return;
        }

        $this->adminView('galeri/edit', [
            'title' => 'Edit Album',
            'album' => $album,
        ]);
    }


    /**
     * Update album
     */
    public function update(int $id)
    {
        $album = $this->albumModel->findById($id);

        if (!$album) {
            http_response_code(404);
            echo "Album tidak ditemukan.";
            return;
        }

        $nama = trim($_POST['nama'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');

        if ($nama === '') {
            $this->redirect("/superadmin/galeri/edit/{$id}");
        }

        if ($slug === '') {
            $slug = $this->slugify($nama);
        }

        $cover = $album['cover'];

        $newCover = $this->uploadCover();

        if ($newCover !== null) {
            $cover = $newCover;
        }

        $this->albumModel->updateAdmin($id, [
            'nama' => $nama,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'cover' => $cover,
        ]);

        $this->redirect('/superadmin/galeri');
    }


    /**
     * Hapus album
     */
    public function delete(int $id)
    {
        $this->albumModel->softDelete($id);

        $this->redirect('/superadmin/galeri');
    }


    /* =========================================================
     * FOTO
     * ========================================================= */

    /**
     * Daftar foto dalam album
     */
    public function photos(int $albumId)
    {
        $album = $this->albumModel->findById($albumId);

        if (!$album) {
            http_response_code(404);
            echo "Album tidak ditemukan.";
            return;
        }

        $galeri = $this->galeriModel->getByAlbum($albumId);

        $this->adminView('galeri/photos', [
            'title' => 'Foto - ' . $album['nama'],
            'album' => $album,
            'galeri' => $galeri,
        ]);
    }


    /**
     * Form tambah foto
     */
    public function createPhoto(int $albumId)
    {
        $album = $this->albumModel->findById($albumId);

        if (!$album) {
            http_response_code(404);
            echo "Album tidak ditemukan.";
            return;
        }

        $this->adminView('galeri/photo-create', [
            'title' => 'Tambah Foto',
            'album' => $album,
        ]);
    }


    /**
     * Simpan foto
     */
    public function storePhoto(int $albumId)
    {
        $album = $this->albumModel->findById($albumId);

        if (!$album) {
            http_response_code(404);
            echo "Album tidak ditemukan.";
            return;
        }

        $judul = trim($_POST['judul'] ?? '');
        $caption = trim($_POST['caption'] ?? '');

        if ($judul === '') {
            $judul = $album['nama'];
        }

        $gambar = $this->uploadPhoto();

        if ($gambar === null) {
            $this->redirect(
                "/superadmin/galeri/{$albumId}/foto/create"
            );
        }

        $this->galeriModel->createAdmin([
            'album_id' => $albumId,
            'judul' => $judul,
            'caption' => $caption,
            'gambar' => $gambar,
        ]);

        $this->redirect(
            "/superadmin/galeri/{$albumId}/foto"
        );
    }


    /**
     * Form edit foto
     */
    public function editPhoto(int $id)
    {
        $foto = $this->galeriModel->findById($id);

        if (!$foto) {
            http_response_code(404);
            echo "Foto tidak ditemukan.";
            return;
        }

        $this->adminView('galeri/photo-edit', [
            'title' => 'Edit Foto',
            'foto' => $foto,
        ]);
    }


    /**
     * Update foto
     */
    public function updatePhoto(int $id)
    {
        $foto = $this->galeriModel->findById($id);

        if (!$foto) {
            http_response_code(404);
            echo "Foto tidak ditemukan.";
            return;
        }

        $judul = trim($_POST['judul'] ?? '');
        $caption = trim($_POST['caption'] ?? '');

        $gambar = $foto['gambar'];

        $newGambar = $this->uploadPhoto();

        if ($newGambar !== null) {
            $gambar = $newGambar;
        }

        $this->galeriModel->updateAdmin($id, [
            'album_id' => (int) $foto['album_id'],
            'judul' => $judul,
            'caption' => $caption,
            'gambar' => $gambar,
        ]);

        $this->redirect(
            "/superadmin/galeri/{$foto['album_id']}/foto"
        );
    }


    /**
     * Hapus foto
     */
    public function deletePhoto(int $id)
    {
        $foto = $this->galeriModel->findById($id);

        if (!$foto) {
            http_response_code(404);
            echo "Foto tidak ditemukan.";
            return;
        }

        $albumId = (int) $foto['album_id'];

        $this->galeriModel->softDelete($id);

        $this->redirect(
            "/superadmin/galeri/{$albumId}/foto"
        );
    }


    /* =========================================================
     * UPLOAD
     * ========================================================= */

    private function uploadCover(): ?string
    {
        if (
            !isset($_FILES['cover']) ||
            $_FILES['cover']['error'] === UPLOAD_ERR_NO_FILE
        ) {
            return null;
        }

        if ($_FILES['cover']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowed = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $extension = strtolower(
            pathinfo(
                $_FILES['cover']['name'],
                PATHINFO_EXTENSION
            )
        );

        if (!in_array($extension, $allowed, true)) {
            return null;
        }

        $directory = PUBLIC_PATH . '/uploads/galeri/album';

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename =
            uniqid('album_', true)
            . '.'
            . $extension;

        move_uploaded_file(
            $_FILES['cover']['tmp_name'],
            $directory . '/' . $filename
        );

        return 'uploads/galeri/album/' . $filename;
    }


    private function uploadPhoto(): ?string
    {
        if (
            !isset($_FILES['gambar']) ||
            $_FILES['gambar']['error'] === UPLOAD_ERR_NO_FILE
        ) {
            return null;
        }

        if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowed = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $extension = strtolower(
            pathinfo(
                $_FILES['gambar']['name'],
                PATHINFO_EXTENSION
            )
        );

        if (!in_array($extension, $allowed, true)) {
            return null;
        }

        $directory = PUBLIC_PATH . '/uploads/galeri/content';

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename =
            uniqid('galeri_', true)
            . '.'
            . $extension;

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            $directory . '/' . $filename
        );

        return 'uploads/galeri/content/' . $filename;
    }


    /* =========================================================
     * HELPER
     * ========================================================= */

    private function slugify(string $text): string
    {
        $text = strtolower(trim($text));

        $text = preg_replace(
            '/[^a-z0-9]+/',
            '-',
            $text
        );

        return trim($text, '-');
    }
}