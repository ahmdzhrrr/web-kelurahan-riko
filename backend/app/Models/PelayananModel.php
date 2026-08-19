<?php

namespace App\Models;

use App\Core\Model;

class PelayananModel extends Model
{
    protected string $table = 'pelayanan';

    protected string $primaryKey = 'id';

    protected array $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'jam_pelayanan',
        'link',
        'icon',
    ];

    public function allPelayanan(): array
    {
        return $this->query("
            SELECT *
            FROM pelayanan
            WHERE deleted_at IS NULL
            ORDER BY id DESC
        ");
    }

    public function featuredPelayanan(int $limit = 3): array
    {
        $limit = max(1, min($limit, 20));

        return $this->query("
            SELECT *
            FROM pelayanan
            WHERE deleted_at IS NULL
            ORDER BY id DESC
            LIMIT {$limit}
        ");
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM pelayanan
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

    public function getByIdAdmin(int $id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM pelayanan
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

    public function getPersyaratan(int $pelayananId): array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM persyaratan_pelayanan
            WHERE pelayanan_id = ?
            ORDER BY urutan ASC, id ASC
        ");

        $stmt->bind_param('i', $pelayananId);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteSoft(int $id): bool
    {
        $stmt = $this->db->prepare("
            UPDATE pelayanan
            SET deleted_at = CURRENT_TIMESTAMP
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}