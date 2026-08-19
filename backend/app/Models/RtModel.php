<?php

namespace App\Models;

use App\Core\Model;

class RtModel extends Model
{
    protected string $table = 'rt';

    protected string $primaryKey = 'id';


    /**
     * =========================================================
     * DATA PUBLIK
     * =========================================================
     */

    /**
     * Mengambil semua RT yang masih aktif.
     */
    public function allActive(): array
    {
        return $this->query("
            SELECT *
            FROM rt
            WHERE deleted_at IS NULL
            ORDER BY nomor_rt ASC
        ");
    }


    /**
     * =========================================================
     * DATA ADMIN
     * =========================================================
     */

    /**
     * Mengambil semua RT termasuk yang sudah dihapus/nonaktif.
     */
    public function all(): array
    {
        return $this->query("
            SELECT *
            FROM rt
            ORDER BY nomor_rt ASC
        ");
    }


    /**
     * Mengambil satu data RT berdasarkan ID.
     */
    public function findById(int $id): ?array
    {
        $result = $this->query("
            SELECT *
            FROM rt
            WHERE id = ?
            LIMIT 1
        ", [$id]);

        return $result[0] ?? null;
    }


    /**
     * Menambahkan data RT baru.
     */
    public function create(array $data): int|false
    {
        $stmt = $this->db->prepare("
            INSERT INTO rt (
                nomor_rt,
                nama_ketua,
                foto,
                jumlah_kk,
                jumlah_penduduk
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'sssii',
            $data['nomor_rt'],
            $data['nama_ketua'],
            $data['foto'],
            $data['jumlah_kk'],
            $data['jumlah_penduduk']
        );

        if ($stmt->execute()) {
            return $this->db->insert_id;
        }

        return false;
    }


    /**
     * Mengubah data RT.
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("
            UPDATE rt
            SET
                nomor_rt = ?,
                nama_ketua = ?,
                foto = ?,
                jumlah_kk = ?,
                jumlah_penduduk = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'sssiii',
            $data['nomor_rt'],
            $data['nama_ketua'],
            $data['foto'],
            $data['jumlah_kk'],
            $data['jumlah_penduduk'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Mengubah data RT tanpa mengganti foto.
     */
    public function updateWithoutPhoto(int $id, array $data): bool
    {
        $stmt = $this->db->prepare("
            UPDATE rt
            SET
                nomor_rt = ?,
                nama_ketua = ?,
                jumlah_kk = ?,
                jumlah_penduduk = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'ssiii',
            $data['nomor_rt'],
            $data['nama_ketua'],
            $data['jumlah_kk'],
            $data['jumlah_penduduk'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete RT.
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE rt
            SET deleted_at = CURRENT_TIMESTAMP
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /**
     * Mengaktifkan kembali RT yang sudah dinonaktifkan.
     */
    public function restore(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE rt
            SET deleted_at = NULL
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}