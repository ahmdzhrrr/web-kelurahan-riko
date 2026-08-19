<?php

namespace App\Models;

use App\Core\Model;

class FasilitasModel extends Model
{
    protected string $table = 'fasilitas';

    protected string $primaryKey = 'id';


    /* =========================================================
     * PUBLIC
     * ========================================================= */

    public function allFasilitas(): array
    {
        $result = $this->db->query("
            SELECT
                f.*,
                GROUP_CONCAT(
                    ff.gambar
                    ORDER BY ff.id ASC
                    SEPARATOR '|||'
                ) AS foto
            FROM fasilitas f

            LEFT JOIN fasilitas_foto ff
                ON ff.fasilitas_id = f.id

            WHERE f.deleted_at IS NULL

            GROUP BY f.id

            ORDER BY f.id ASC
        ");

        $fasilitas = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($fasilitas as &$item) {

            $item['foto'] = !empty($item['foto'])
                ? explode('|||', $item['foto'])
                : [];

        }

        return $fasilitas;
    }


    public function featuredFasilitas(int $limit = 3): array
    {
        $limit = max(1, $limit);

        $result = $this->db->query("
            SELECT
                f.*,

                (
                    SELECT ff.gambar
                    FROM fasilitas_foto ff
                    WHERE ff.fasilitas_id = f.id
                    ORDER BY ff.id ASC
                    LIMIT 1
                ) AS gambar

            FROM fasilitas f

            WHERE f.deleted_at IS NULL

            ORDER BY f.id ASC

            LIMIT {$limit}
        ");

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /* =========================================================
     * ADMIN
     * ========================================================= */

    /**
     * Semua fasilitas untuk admin.
     */
    public function allForAdmin(): array
    {
        $result = $this->db->query("
            SELECT
                f.*,
                COUNT(ff.id) AS jumlah_foto

            FROM fasilitas f

            LEFT JOIN fasilitas_foto ff
                ON ff.fasilitas_id = f.id

            WHERE f.deleted_at IS NULL

            GROUP BY f.id

            ORDER BY f.id DESC
        ");

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil fasilitas berdasarkan ID.
     */
    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fasilitas

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
     * Tambah fasilitas.
     */
    public function createAdmin(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO fasilitas (
                nama,
                deskripsi,
                created_at,
                updated_at
            )
            VALUES (
                ?,
                ?,
                NOW(),
                NOW()
            )
        ");

        $stmt->bind_param(
            'ss',
            $data['nama'],
            $data['deskripsi']
        );

        return $stmt->execute();
    }


    /**
     * Update fasilitas.
     */
    public function updateAdmin(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE fasilitas
            SET
                nama = ?,
                deskripsi = ?,
                updated_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'ssi',
            $data['nama'],
            $data['deskripsi'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete fasilitas.
     */
    public function softDelete(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE fasilitas
            SET deleted_at = NOW()

            WHERE id = ?
            AND deleted_at IS NULL
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /* =========================================================
     * FOTO
     * ========================================================= */

    /**
     * Ambil semua foto fasilitas.
     */
    public function getFoto(int $fasilitasId): array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fasilitas_foto

            WHERE fasilitas_id = ?

            ORDER BY id ASC
        ");

        $stmt->bind_param('i', $fasilitasId);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil satu foto.
     */
    public function findFoto(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM fasilitas_foto

            WHERE id = ?

            LIMIT 1
        ");

        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * Tambah foto.
     */
    public function addFoto(
        int $fasilitasId,
        string $gambar
    ): bool {

        $stmt = $this->db->prepare("
            INSERT INTO fasilitas_foto (
                fasilitas_id,
                gambar,
                created_at
            )
            VALUES (
                ?,
                ?,
                NOW()
            )
        ");

        $stmt->bind_param(
            'is',
            $fasilitasId,
            $gambar
        );

        return $stmt->execute();
    }


    /**
     * Hapus foto.
     */
    public function deleteFoto(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM fasilitas_foto
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}