<?php

namespace App\Models;

use App\Core\Model;

class PegawaiModel extends Model
{
    protected string $table = 'pegawai';

    public function allPegawai(): array
    {
        return $this->query("
            SELECT
                pegawai.*,
                jabatan.nama AS jabatan
            FROM pegawai
            JOIN jabatan
                ON jabatan.id = pegawai.jabatan_id
            ORDER BY jabatan.urutan
        ");
    }
}