<?php

namespace App\Models;

use App\Core\Model;

class GaleriModel extends Model
{
    protected string $table = 'galeri';

    protected string $primaryKey = 'id';


    /* =========================================================
     * PUBLIC
     * ========================================================= */


    /**
     * Foto terbaru untuk beranda.
     */
    public function latestGaleri(
        int $limit = 6
    ): array {

        $limit = max(
            1,
            min($limit, 50)
        );

        return $this->query("
            SELECT
                g.*,
                a.nama AS album_nama,
                a.slug AS album_slug

            FROM galeri g

            LEFT JOIN album_galeri a
                ON a.id = g.album_id

            WHERE g.deleted_at IS NULL

            ORDER BY g.id DESC

            LIMIT {$limit}
        ");
    }


    /**
     * Semua foto dalam album.
     */
    public function getByAlbum(
        int $albumId
    ): array {

        return $this->query("
            SELECT *
            FROM galeri

            WHERE album_id = {$albumId}
            AND deleted_at IS NULL

            ORDER BY id DESC
        ");
    }


    /* =========================================================
     * ADMIN
     * ========================================================= */


    /**
     * Semua foto dalam album untuk admin.
     */
    public function allByAlbumAdmin(
        int $albumId
    ): array {

        $stmt = $this->db->prepare("
            SELECT
                g.*,
                a.nama AS album_nama

            FROM galeri g

            LEFT JOIN album_galeri a
                ON a.id = g.album_id

            WHERE g.album_id = ?
            AND g.deleted_at IS NULL

            ORDER BY g.created_at DESC
        ");

        $stmt->bind_param(
            'i',
            $albumId
        );

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Cari foto berdasarkan ID.
     */
    public function findAdmin(
        int $id
    ): ?array {

        $stmt = $this->db->prepare("
            SELECT
                g.*,
                a.nama AS album_nama

            FROM galeri g

            LEFT JOIN album_galeri a
                ON a.id = g.album_id

            WHERE g.id = ?
            AND g.deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param(
            'i',
            $id
        );

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * Tambah foto.
     */
    public function createAdmin(
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            INSERT INTO galeri (
                album_id,
                judul,
                caption,
                gambar,
                created_at,
                updated_at
            )

            VALUES (
                ?,
                ?,
                ?,
                ?,
                NOW(),
                NOW()
            )
        ");

        $stmt->bind_param(
            'isss',
            $data['album_id'],
            $data['judul'],
            $data['caption'],
            $data['gambar']
        );

        return $stmt->execute();
    }


    /**
     * Update foto.
     */
    public function updateAdmin(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE galeri

            SET
                judul = ?,
                caption = ?,
                gambar = ?,
                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'sssi',
            $data['judul'],
            $data['caption'],
            $data['gambar'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete foto.
     */
    public function softDelete(
        int $id
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE galeri

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
}