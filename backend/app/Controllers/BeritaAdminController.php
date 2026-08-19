<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\BeritaModel;
use App\Models\SettingModel;
use App\Models\KategoriBeritaModel;

class BeritaAdminController extends Controller
{
    protected BeritaModel $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $berita = $this->beritaModel->allAdmin();

        $this->adminView('berita/index', [
            'title' => 'Kelola Berita',
            'berita' => $berita,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $kategoriModel = new KategoriBeritaModel();

        $this->adminView('berita/create', [
            'title' => 'Tambah Berita',
            'kategori' => $kategoriModel->all(),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $judul = trim($_POST['judul'] ?? '');
        $kategoriId = (int) ($_POST['kategori_id'] ?? 0);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $isi = $_POST['isi'] ?? '';
        $metaTitle = trim($_POST['meta_title'] ?? '');
        $metaDescription = trim($_POST['meta_description'] ?? '');
        $thumbnailAlt = trim($_POST['thumbnail_alt'] ?? '');
        $status = $_POST['status'] ?? 'draft';
        $isFeatured = isset($_POST['is_featured']) ? 1 : 0;

        if ($judul === '') {
            $this->redirect('/superadmin/berita/create');
        }

        if (!in_array($status, ['draft', 'published'], true)) {
            $status = 'draft';
        }

        $slug = $this->generateSlug($judul);

        $thumbnail = $this->uploadThumbnail();

        $user = Auth::user();

        $userId = (int) ($user['id'] ?? 0);

        $publishedAt = null;

        if ($status === 'published') {
            $publishedAt = date('Y-m-d H:i:s');
        }

        $this->beritaModel->createAdmin([
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'thumbnail_alt' => $thumbnailAlt,
            'kategori_id' => $kategoriId,
            'user_id' => $userId,
            'judul' => $judul,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'isi' => $isi,
            'thumbnail' => $thumbnail,
            'views' => 0,
            'is_featured' => $isFeatured,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        $this->redirect('/superadmin/berita');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(int $id)
    {
        $berita = $this->beritaModel->findAdmin($id);

        if (!$berita) {
            http_response_code(404);
            echo 'Berita tidak ditemukan.';
            return;
        }

        $kategoriModel = new KategoriBeritaModel();

        $this->adminView('berita/edit', [
            'title' => 'Edit Berita',
            'berita' => $berita,
            'kategori' => $kategoriModel->all(),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(int $id)
    {
        $berita = $this->beritaModel->findAdmin($id);

        if (!$berita) {
            http_response_code(404);
            echo 'Berita tidak ditemukan.';
            return;
        }

        $judul = trim($_POST['judul'] ?? '');
        $kategoriId = (int) ($_POST['kategori_id'] ?? 0);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $isi = $_POST['isi'] ?? '';
        $metaTitle = trim($_POST['meta_title'] ?? '');
        $metaDescription = trim($_POST['meta_description'] ?? '');
        $thumbnailAlt = trim($_POST['thumbnail_alt'] ?? '');
        $status = $_POST['status'] ?? 'draft';
        $isFeatured = isset($_POST['is_featured']) ? 1 : 0;

        if ($judul === '') {
            $this->redirect("/superadmin/berita/edit/{$id}");
        }

        if (!in_array($status, ['draft', 'published'], true)) {
            $status = 'draft';
        }

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $this->generateSlug($judul, $id);


        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        $thumbnail = $berita['thumbnail'];

        if (
            isset($_FILES['thumbnail']) &&
            $_FILES['thumbnail']['error'] !== UPLOAD_ERR_NO_FILE
        ) {

            $newThumbnail = $this->uploadThumbnail();

            if ($newThumbnail) {

                $this->deleteThumbnail(
                    $berita['thumbnail']
                );

                $thumbnail = $newThumbnail;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Published At
        |--------------------------------------------------------------------------
        */

        $publishedAt = $berita['published_at'];

        if ($status === 'published' && empty($publishedAt)) {
            $publishedAt = date('Y-m-d H:i:s');
        }

        if ($status === 'draft') {
            $publishedAt = null;
        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $this->beritaModel->updateAdmin(
            $id,
            [
                'meta_title' => $metaTitle,
                'meta_description' => $metaDescription,
                'thumbnail_alt' => $thumbnailAlt,
                'kategori_id' => $kategoriId,
                'judul' => $judul,
                'slug' => $slug,
                'excerpt' => $excerpt,
                'isi' => $isi,
                'thumbnail' => $thumbnail,
                'is_featured' => $isFeatured,
                'status' => $status,
                'published_at' => $publishedAt,
            ]
        );

        $this->redirect('/superadmin/berita');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete(int $id)
    {
        $berita = $this->beritaModel->findAdmin($id);

        if (!$berita) {
            $this->redirect('/superadmin/berita');
        }

        $this->beritaModel->softDelete($id);

        $this->redirect('/superadmin/berita');
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLISH
    |--------------------------------------------------------------------------
    */

    public function publish(int $id)
    {
        $berita = $this->beritaModel->findAdmin($id);

        if (!$berita) {
            $this->redirect('/superadmin/berita');
        }

        $this->beritaModel->setStatus(
            $id,
            'published',
            date('Y-m-d H:i:s')
        );

        $this->redirect('/superadmin/berita');
    }


    /*
    |--------------------------------------------------------------------------
    | DRAFT
    |--------------------------------------------------------------------------
    */

    public function draft(int $id)
    {
        $berita = $this->beritaModel->findAdmin($id);

        if (!$berita) {
            $this->redirect('/superadmin/berita');
        }

        $this->beritaModel->setStatus(
            $id,
            'draft',
            null
        );

        $this->redirect('/superadmin/berita');
    }


    /*
    |--------------------------------------------------------------------------
    | GENERATE SLUG
    |--------------------------------------------------------------------------
    */

    private function generateSlug(
        string $judul,
        ?int $ignoreId = null
    ): string {

        $slug = strtolower($judul);

        $slug = preg_replace(
            '/[^a-z0-9]+/',
            '-',
            $slug
        );

        $slug = trim($slug, '-');

        $originalSlug = $slug;
        $counter = 1;

        while (
            $this->beritaModel->slugExists(
                $slug,
                $ignoreId
            )
        ) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }

        return $slug;
    }


    /*
    |--------------------------------------------------------------------------
    | UPLOAD THUMBNAIL
    |--------------------------------------------------------------------------
    */

    private function uploadThumbnail(): ?string
    {
        if (
            !isset($_FILES['thumbnail']) ||
            $_FILES['thumbnail']['error'] === UPLOAD_ERR_NO_FILE
        ) {
            return null;
        }

        if ($_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES['thumbnail'];

        $allowed = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];

        $mime = mime_content_type(
            $file['tmp_name']
        );

        if (!isset($allowed[$mime])) {
            return null;
        }

        $extension = $allowed[$mime];

        $filename =
            uniqid('berita_', true)
            . '.'
            . $extension;

        $uploadDir =
            PUBLIC_PATH
            . '/uploads/berita/thumbnail';

        if (!is_dir($uploadDir)) {
            mkdir(
                $uploadDir,
                0755,
                true
            );
        }

        $destination =
            $uploadDir
            . '/'
            . $filename;

        if (
            !move_uploaded_file(
                $file['tmp_name'],
                $destination
            )
        ) {
            return null;
        }

        return 'uploads/berita/thumbnail/' . $filename;
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE THUMBNAIL
    |--------------------------------------------------------------------------
    */

    private function deleteThumbnail(?string $thumbnail): void
    {
        if (!$thumbnail) {
            return;
        }

        $file = PUBLIC_PATH . '/' . ltrim(
            $thumbnail,
            '/'
        );

        if (file_exists($file)) {
            unlink($file);
        }
    }
}