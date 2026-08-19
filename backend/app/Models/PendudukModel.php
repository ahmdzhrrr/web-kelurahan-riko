<?php

namespace App\Models;

use App\Core\Model;

class PendudukModel extends Model
{
    protected string $table = 'penduduk_rekapitulasi';


    /*
    |--------------------------------------------------------------------------
    | PUBLIC
    |--------------------------------------------------------------------------
    */

    public function getPekerjaan(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_pekerjaan
            ORDER BY urutan ASC
        ");
    }


    public function getPendidikan(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_pendidikan
            ORDER BY urutan ASC
        ");
    }


    public function getKepalaKeluarga(): ?array
    {
        $result = $this->query("
            SELECT *
            FROM penduduk_kepala_keluarga
            ORDER BY id DESC
            LIMIT 1
        ");

        return $result[0] ?? null;
    }


    public function getRekapitulasi(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_rekapitulasi
            ORDER BY urutan ASC
        ");
    }


    public function getKKPerRT(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_kk_rt
            ORDER BY urutan ASC
        ");
    }


    public function getPendudukPerRT(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_rt
            ORDER BY urutan ASC
        ");
    }


    public function getUmur(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_umur
            ORDER BY urutan ASC
        ");
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PEKERJAAN
    |--------------------------------------------------------------------------
    */

    public function adminPekerjaan(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_pekerjaan
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createPekerjaan(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_pekerjaan
            (
                pekerjaan,
                laki_laki,
                perempuan,
                jumlah,
                urutan
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'siiii',
            $data['pekerjaan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updatePekerjaan(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_pekerjaan
            SET
                pekerjaan = ?,
                laki_laki = ?,
                perempuan = ?,
                jumlah = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siiiii',
            $data['pekerjaan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deletePekerjaan(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_pekerjaan
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PENDIDIKAN
    |--------------------------------------------------------------------------
    */

    public function adminPendidikan(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_pendidikan
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createPendidikan(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_pendidikan
            (
                pendidikan,
                laki_laki,
                perempuan,
                jumlah,
                urutan
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'siiii',
            $data['pendidikan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updatePendidikan(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_pendidikan
            SET
                pendidikan = ?,
                laki_laki = ?,
                perempuan = ?,
                jumlah = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siiiii',
            $data['pendidikan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deletePendidikan(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_pendidikan
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - KEPALA KELUARGA
    |--------------------------------------------------------------------------
    */

    public function adminKepalaKeluarga(): ?array
    {
        $result = $this->query("
            SELECT *
            FROM penduduk_kepala_keluarga
            ORDER BY id DESC
            LIMIT 1
        ");

        return $result[0] ?? null;
    }


    public function createKepalaKeluarga(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_kepala_keluarga
            (
                kk_bulan_lalu,
                datang,
                pindah,
                kk_bulan_ini
            )
            VALUES (?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'iiii',
            $data['kk_bulan_lalu'],
            $data['datang'],
            $data['pindah'],
            $data['kk_bulan_ini']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updateKepalaKeluarga(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_kepala_keluarga
            SET
                kk_bulan_lalu = ?,
                datang = ?,
                pindah = ?,
                kk_bulan_ini = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'iiiii',
            $data['kk_bulan_lalu'],
            $data['datang'],
            $data['pindah'],
            $data['kk_bulan_ini'],
            $id
        );

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - REKAPITULASI
    |--------------------------------------------------------------------------
    */

    public function adminRekapitulasi(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_rekapitulasi
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createRekapitulasi(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_rekapitulasi
            (
                keterangan,
                laki_laki,
                perempuan,
                jumlah,
                urutan
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'siiii',
            $data['keterangan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updateRekapitulasi(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_rekapitulasi
            SET
                keterangan = ?,
                laki_laki = ?,
                perempuan = ?,
                jumlah = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siiiii',
            $data['keterangan'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deleteRekapitulasi(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_rekapitulasi
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - KK PER RT
    |--------------------------------------------------------------------------
    */

    public function adminKKPerRT(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_kk_rt
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createKKPerRT(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_kk_rt
            (
                rt,
                jumlah_kk,
                urutan
            )
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param(
            'sii',
            $data['rt'],
            $data['jumlah_kk'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updateKKPerRT(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_kk_rt
            SET
                rt = ?,
                jumlah_kk = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siii',
            $data['rt'],
            $data['jumlah_kk'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deleteKKPerRT(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_kk_rt
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PENDUDUK PER RT
    |--------------------------------------------------------------------------
    */

    public function adminPendudukPerRT(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_rt
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createPendudukPerRT(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_rt
            (
                rt,
                laki_laki,
                perempuan,
                jumlah,
                urutan
            )
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            'siiii',
            $data['rt'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updatePendudukPerRT(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_rt
            SET
                rt = ?,
                laki_laki = ?,
                perempuan = ?,
                jumlah = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siiiii',
            $data['rt'],
            $data['laki_laki'],
            $data['perempuan'],
            $data['jumlah'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deletePendudukPerRT(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_rt
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - KELOMPOK UMUR
    |--------------------------------------------------------------------------
    */

    public function adminUmur(): array
    {
        return $this->query("
            SELECT *
            FROM penduduk_umur
            ORDER BY urutan ASC, id ASC
        ");
    }


    public function createUmur(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO penduduk_umur
            (
                kelompok_umur,
                jumlah,
                urutan
            )
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param(
            'sii',
            $data['kelompok_umur'],
            $data['jumlah'],
            $data['urutan']
        );

        $stmt->execute();

        return $this->db->insert_id;
    }


    public function updateUmur(
        int $id,
        array $data
    ): bool {

        $stmt = $this->db->prepare("
            UPDATE penduduk_umur
            SET
                kelompok_umur = ?,
                jumlah = ?,
                urutan = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'siii',
            $data['kelompok_umur'],
            $data['jumlah'],
            $data['urutan'],
            $id
        );

        return $stmt->execute();
    }


    public function deleteUmur(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM penduduk_umur
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}