<?php

namespace App\Models;

use App\Core\Model;

class SejarahModel extends Model
{
    protected string $table = 'sejarah';

    protected array $fillable = [
        'judul',
        'isi',
        'foto_1',
        'foto_2',
    ];

    public function getSejarah(): ?array
    {
        return $this->query("
            SELECT *
            FROM sejarah
            WHERE deleted_at IS NULL
            ORDER BY id ASC
            LIMIT 1
        ")[0] ?? null;
    }
}