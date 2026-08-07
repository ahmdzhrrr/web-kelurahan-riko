<?php

namespace App\Models;

use App\Core\Model;

class FasilitasModel extends Model
{
    protected string $table = 'fasilitas';

    public function allFasilitas(): array
    {
        return $this->query("
            SELECT *
            FROM fasilitas
            ORDER BY id DESC
        ");
    }
}