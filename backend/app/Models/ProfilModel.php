<?php

namespace App\Models;

use App\Core\Model;

class ProfilModel extends Model
{
    protected string $table = 'profil';

    public function getProfil(): ?array
    {
        return $this->first();
    }
}