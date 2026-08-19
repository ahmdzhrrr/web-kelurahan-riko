<?php

namespace App\Models;

use App\Core\Model;

class HeroModel extends Model
{
    protected string $table = 'hero';

    public function getHero(): ?array
    {
        $result = $this->query("
            SELECT *
            FROM hero
            WHERE is_active = 1
            ORDER BY urutan ASC, id ASC
            LIMIT 1
        ");

        return $result[0] ?? null;
    }
}