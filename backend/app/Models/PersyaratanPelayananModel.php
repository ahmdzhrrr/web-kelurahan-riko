<?php

namespace App\Models;

use App\Core\Model;

class PersyaratanPelayananModel extends Model
{
    protected string $table = 'persyaratan_pelayanan';

    protected array $fillable = [
        'pelayanan_id',
        'persyaratan',
        'urutan',
    ];

    public function allByPelayanan(int $pelayananId): array
    {
        return $this->query("
            SELECT *
            FROM persyaratan_pelayanan
            WHERE pelayanan_id = {$pelayananId}
            ORDER BY urutan ASC, id ASC
        ");
    }

    public function getById(int $id): ?array
    {
        return $this->find($id);
    }

    public function deleteById(int $id): bool
    {
        $stmt = $this->db->prepare("
            DELETE
            FROM persyaratan_pelayanan
            WHERE id = ?
        ");

        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }

    public function deleteByPelayanan(int $pelayananId): bool
    {
        $stmt = $this->db->prepare("
            DELETE
            FROM persyaratan_pelayanan
            WHERE pelayanan_id = ?
        ");

        $stmt->bind_param('i', $pelayananId);

        return $stmt->execute();
    }
}