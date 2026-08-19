<?php

namespace App\Models;

use App\Core\Model;

class BeritaModel extends Model
{
    protected string $table = 'berita';

    protected string $primaryKey = 'id';


    /* =========================================================
     * PUBLIC
     * ========================================================= */


    /**
     * Ambil semua berita yang sudah published.
     */
    public function published(): array
    {
        $stmt = $this->db->prepare("
            SELECT
                b.*,
                k.nama AS kategori,
                k.slug AS kategori_slug,
                u.nama AS penulis

            FROM berita b

            LEFT JOIN kategori_berita k
                ON k.id = b.kategori_id

            LEFT JOIN users u
                ON u.id = b.user_id

            WHERE b.status = 'published'
            AND b.deleted_at IS NULL

            ORDER BY
                b.published_at DESC,
                b.created_at DESC
        ");

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil berita terbaru yang sudah published.
     */
    public function latestPublished(int $limit = 3): array
    {
        $limit = max(1, $limit);

        $result = $this->db->query("
            SELECT
                b.*,
                k.nama AS kategori,
                k.slug AS kategori_slug,
                u.nama AS penulis

            FROM berita b

            LEFT JOIN kategori_berita k
                ON k.id = b.kategori_id

            LEFT JOIN users u
                ON u.id = b.user_id

            WHERE b.status = 'published'
            AND b.deleted_at IS NULL

            ORDER BY
                b.published_at DESC,
                b.created_at DESC

            LIMIT {$limit}
        ");

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil berita berdasarkan slug.
     */
    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("
            SELECT
                b.*,
                k.nama AS kategori,
                k.slug AS kategori_slug,
                u.nama AS penulis

            FROM berita b

            LEFT JOIN kategori_berita k
                ON k.id = b.kategori_id

            LEFT JOIN users u
                ON u.id = b.user_id

            WHERE b.slug = ?
            AND b.status = 'published'
            AND b.deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param('s', $slug);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /* =========================================================
     * ADMIN
     * ========================================================= */


    /**
     * Ambil semua berita untuk halaman admin.
     *
     * Draft dan published ditampilkan.
     * Berita yang sudah soft delete tidak ditampilkan.
     */
    public function allAdmin(): array
    {
        $stmt = $this->db->prepare("
            SELECT
                b.*,
                k.nama AS kategori,
                u.nama AS penulis

            FROM berita b

            LEFT JOIN kategori_berita k
                ON k.id = b.kategori_id

            LEFT JOIN users u
                ON u.id = b.user_id

            WHERE b.deleted_at IS NULL

            ORDER BY
                b.created_at DESC
        ");

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil satu berita berdasarkan ID untuk admin.
     */
    public function findAdmin(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT
                b.*,
                k.nama AS kategori,
                u.nama AS penulis

            FROM berita b

            LEFT JOIN kategori_berita k
                ON k.id = b.kategori_id

            LEFT JOIN users u
                ON u.id = b.user_id

            WHERE b.id = ?
            AND b.deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * Cek apakah slug sudah digunakan.
     *
     * $ignoreId digunakan ketika edit berita.
     */
    public function slugExists(
        string $slug,
        ?int $ignoreId = null
    ): bool {

        if ($ignoreId !== null) {

            $stmt = $this->db->prepare("
                SELECT id
                FROM berita

                WHERE slug = ?
                AND id != ?
                AND deleted_at IS NULL

                LIMIT 1
            ");

            $stmt->bind_param(
                'si',
                $slug,
                $ignoreId
            );

        } else {

            $stmt = $this->db->prepare("
                SELECT id
                FROM berita

                WHERE slug = ?
                AND deleted_at IS NULL

                LIMIT 1
            ");

            $stmt->bind_param(
                's',
                $slug
            );
        }

        $stmt->execute();

        return $stmt
            ->get_result()
            ->num_rows > 0;
    }


    /**
     * Tambah berita baru.
     */
    public function createAdmin(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO berita (

                meta_title,
                meta_description,
                thumbnail_alt,

                kategori_id,
                user_id,

                judul,
                slug,
                excerpt,
                isi,
                thumbnail,

                views,
                is_featured,
                status,
                published_at,

                created_at,
                updated_at

            )

            VALUES (
                ?, ?, ?,
                ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?,
                NOW(),
                NOW()
            )
        ");

        $stmt->bind_param(
            'sssiiissssiiss',

            $data['meta_title'],
            $data['meta_description'],
            $data['thumbnail_alt'],

            $data['kategori_id'],
            $data['user_id'],

            $data['judul'],
            $data['slug'],
            $data['excerpt'],
            $data['isi'],
            $data['thumbnail'],

            $data['views'],
            $data['is_featured'],
            $data['status'],
            $data['published_at']
        );

        return $stmt->execute();
    }


    /**
     * Update berita.
     */
    public function updateAdmin(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE berita

            SET
                meta_title = ?,
                meta_description = ?,
                thumbnail_alt = ?,

                kategori_id = ?,

                judul = ?,
                slug = ?,
                excerpt = ?,
                isi = ?,
                thumbnail = ?,

                is_featured = ?,
                status = ?,
                published_at = ?,

                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'sssisssssissi',

            $data['meta_title'],
            $data['meta_description'],
            $data['thumbnail_alt'],

            $data['kategori_id'],

            $data['judul'],
            $data['slug'],
            $data['excerpt'],
            $data['isi'],
            $data['thumbnail'],

            $data['is_featured'],
            $data['status'],
            $data['published_at'],

            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete berita.
     */
    public function softDelete(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE berita

            SET
                deleted_at = NOW(),
                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'i',
            $id
        );

        return $stmt->execute();
    }


    /**
     * Ubah status berita.
     *
     * published:
     * published_at diisi.
     *
     * draft:
     * published_at dikosongkan.
     */
    public function setStatus(
        int $id,
        string $status,
        ?string $publishedAt
    ): bool {

        if (!in_array(
            $status,
            ['draft', 'published'],
            true
        )) {
            return false;
        }

        $stmt = $this->db->prepare("
            UPDATE berita

            SET
                status = ?,
                published_at = ?,
                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'ssi',
            $status,
            $publishedAt,
            $id
        );

        return $stmt->execute();
    }
}