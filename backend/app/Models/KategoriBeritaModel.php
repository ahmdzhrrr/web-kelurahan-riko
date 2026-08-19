<?php

namespace App\Models;

use App\Core\Model;

class KategoriBeritaModel extends Model
{
    protected string $table = 'kategori_berita';

    protected string $primaryKey = 'id';


    /**
     * Ambil semua kategori berita
     */
    public function all(): array
    {
        $stmt = $this->db->prepare("
            SELECT
                id,
                nama,
                slug
            FROM kategori_berita
            ORDER BY nama ASC
        ");

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }


    /**
     * Ambil kategori berdasarkan ID
     */
    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT
                id,
                nama,
                slug
            FROM kategori_berita
            WHERE id = ?
            LIMIT 1
        ");

        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }
}