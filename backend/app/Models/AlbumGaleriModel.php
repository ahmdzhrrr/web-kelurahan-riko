<?php

namespace App\Models;

use App\Core\Model;

class AlbumGaleriModel extends Model
{
    protected string $table = 'album_galeri';

    /**
     * =========================================================
     * PUBLIC
     * =========================================================
     */

    /**
     * Semua album yang belum dihapus.
     */
    public function allAlbum(): array
    {
        return $this->query("
            SELECT
                a.*,
                COUNT(g.id) AS jumlah_foto
            FROM album_galeri a

            LEFT JOIN galeri g
                ON g.album_id = a.id
                AND g.deleted_at IS NULL

            WHERE a.deleted_at IS NULL

            GROUP BY a.id

            ORDER BY a.id DESC
        ");
    }


    /**
     * Album berdasarkan slug.
     */
    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM album_galeri

            WHERE slug = ?
            AND deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param('s', $slug);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * =========================================================
     * ADMIN
     * =========================================================
     */

    /**
     * Ambil album berdasarkan ID.
     *
     * Dipakai oleh:
     * /superadmin/galeri/{id}/photos
     */
    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM album_galeri

            WHERE id = ?
            AND deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * Tambah album.
     */
    public function createAlbum(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO album_galeri (
                nama,
                slug,
                deskripsi,
                cover,
                created_at,
                updated_at
            )
            VALUES (
                ?, ?, ?, ?, NOW(), NOW()
            )
        ");

        $stmt->bind_param(
            'ssss',
            $data['nama'],
            $data['slug'],
            $data['deskripsi'],
            $data['cover']
        );

        return $stmt->execute();
    }


    /**
     * Update album.
     */
    public function updateAlbum(
        int $id,
        array $data
    ): bool {
        $stmt = $this->db->prepare("
            UPDATE album_galeri
            SET
                nama = ?,
                slug = ?,
                deskripsi = ?,
                cover = ?,
                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'ssssi',
            $data['nama'],
            $data['slug'],
            $data['deskripsi'],
            $data['cover'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete album.
     */
    public function softDelete(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE album_galeri
            SET
                deleted_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}