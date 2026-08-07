<?php

namespace App\Models;

use App\Core\Model;

class KontakModel extends Model
{
    protected string $table = 'kontak';

    public function getKontak(): ?array
    {
        return $this->first();
    }
}