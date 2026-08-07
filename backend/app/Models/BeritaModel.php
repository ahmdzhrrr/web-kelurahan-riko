<?php

namespace App\Models;

use App\Core\Model;

class BeritaModel extends Model
{
    protected string $table = 'berita';

    public function published(): array
    {
        return $this->query("
            SELECT *
            FROM berita
            WHERE status='published'
            ORDER BY published_at DESC
        ");
    }

    public function featured(): array
    {
        return $this->query("
            SELECT *
            FROM berita
            WHERE featured=1
            ORDER BY published_at DESC
            LIMIT 3
        ");
    }
}