<?php

namespace App\Models;

use App\Core\Model;

class PegawaiModel extends Model
{
    protected string $table = 'pegawai';

    protected string $primaryKey = 'id';


    /* =========================================================
     * PUBLIC
     * ========================================================= */

    /**
     * Semua pegawai untuk halaman Aparatur Kelurahan
     */
    public function allPegawai(): array
    {
        return $this->query("
            SELECT
                p.id,
                p.nama,
                p.nip,
                p.email,
                p.telepon,
                p.riwayat_pendidikan,
                p.foto,
                p.status,

                j.nama AS jabatan,
                j.urutan AS urutan_jabatan,

                u.id AS unit_organisasi_id,
                u.nama AS unit_organisasi,
                u.tipe AS tipe_unit,
                u.urutan AS urutan_unit

            FROM pegawai p

            LEFT JOIN jabatan j
                ON j.id = p.jabatan_id

            LEFT JOIN unit_organisasi u
                ON u.id = p.unit_organisasi_id
                AND u.deleted_at IS NULL

            WHERE p.deleted_at IS NULL

            ORDER BY
                u.urutan ASC,
                j.urutan ASC,
                p.id ASC
        ");
    }


    /**
     * Pegawai yang ditampilkan di beranda
     */
    public function featuredPegawai(int $limit = 6): array
    {
        $limit = max(1, min($limit, 20));

        return $this->query("
            SELECT
                p.id,
                p.nama,
                p.nip,
                p.foto,

                j.nama AS jabatan,
                j.urutan AS urutan_jabatan,

                u.nama AS unit_organisasi,
                u.tipe AS tipe_unit

            FROM pegawai p

            LEFT JOIN jabatan j
                ON j.id = p.jabatan_id

            LEFT JOIN unit_organisasi u
                ON u.id = p.unit_organisasi_id
                AND u.deleted_at IS NULL

            WHERE p.deleted_at IS NULL
              AND p.status = 'aktif'

            ORDER BY
                j.urutan ASC,
                p.id ASC

            LIMIT {$limit}
        ");
    }


    /* =========================================================
     * ADMIN
     * ========================================================= */

    /**
     * Semua pegawai untuk admin.
     *
     * Draft/nonaktif tetap ditampilkan.
     * Data yang sudah soft delete tidak ditampilkan.
     */
    public function allForAdmin(): array
    {
        return $this->query("
            SELECT
                p.id,
                p.jabatan_id,
                p.unit_organisasi_id,
                p.nama,
                p.nip,
                p.email,
                p.telepon,
                p.riwayat_pendidikan,
                p.foto,
                p.status,
                p.created_at,
                p.updated_at,

                j.nama AS jabatan,

                u.nama AS unit_organisasi,
                u.tipe AS tipe_unit

            FROM pegawai p

            LEFT JOIN jabatan j
                ON j.id = p.jabatan_id

            LEFT JOIN unit_organisasi u
                ON u.id = p.unit_organisasi_id
                AND u.deleted_at IS NULL

            WHERE p.deleted_at IS NULL

            ORDER BY
                u.urutan ASC,
                j.urutan ASC,
                p.id ASC
        ");
    }


    /**
     * Ambil satu pegawai berdasarkan ID.
     */
    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT
                p.*,

                j.nama AS jabatan,
                j.urutan AS urutan_jabatan,

                u.nama AS unit_organisasi,
                u.tipe AS tipe_unit,
                u.urutan AS urutan_unit

            FROM pegawai p

            LEFT JOIN jabatan j
                ON j.id = p.jabatan_id

            LEFT JOIN unit_organisasi u
                ON u.id = p.unit_organisasi_id

            WHERE p.id = ?
              AND p.deleted_at IS NULL

            LIMIT 1
        ");

        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }


    /**
     * Semua jabatan untuk dropdown.
     */
    public function allJabatan(): array
    {
        return $this->query("
            SELECT
                id,
                nama,
                urutan
            FROM jabatan
            ORDER BY urutan ASC, nama ASC
        ");
    }


    /**
     * Semua unit organisasi untuk dropdown.
     */
    public function allUnitOrganisasi(): array
    {
        return $this->query("
            SELECT
                id,
                nama,
                tipe,
                urutan
            FROM unit_organisasi

            WHERE deleted_at IS NULL

            ORDER BY
                urutan ASC,
                nama ASC
        ");
    }


    /**
     * Tambah pegawai.
     */
    public function createAdmin(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO pegawai (
                jabatan_id,
                unit_organisasi_id,
                nama,
                nip,
                email,
                telepon,
                riwayat_pendidikan,
                foto,
                status,
                created_at,
                updated_at
            )
            VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()
            )
        ");

        $stmt->bind_param(
            'iisssssss',
            $data['jabatan_id'],
            $data['unit_organisasi_id'],
            $data['nama'],
            $data['nip'],
            $data['email'],
            $data['telepon'],
            $data['riwayat_pendidikan'],
            $data['foto'],
            $data['status']
        );

        return $stmt->execute();
    }


    /**
     * Update pegawai.
     */
    public function updateAdmin(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE pegawai
            SET
                jabatan_id = ?,
                unit_organisasi_id = ?,
                nama = ?,
                nip = ?,
                email = ?,
                telepon = ?,
                riwayat_pendidikan = ?,
                foto = ?,
                status = ?,
                updated_at = NOW()

            WHERE id = ?
              AND deleted_at IS NULL
        ");

        $stmt->bind_param(
            'iisssssssi',
            $data['jabatan_id'],
            $data['unit_organisasi_id'],
            $data['nama'],
            $data['nip'],
            $data['email'],
            $data['telepon'],
            $data['riwayat_pendidikan'],
            $data['foto'],
            $data['status'],
            $id
        );

        return $stmt->execute();
    }


    /**
     * Soft delete pegawai.
     */
    public function softDelete(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE pegawai
            SET deleted_at = NOW()
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}