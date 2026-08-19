<?php

namespace App\Models;

use App\Core\Model;

class VisiMisiModel extends Model
{
    protected string $table = 'visi_misi';

    public function getVisi(): array
    {
        return $this->firstWhere('jenis', 'visi') ?? [];
    }

    public function getMisi(): array
    {
        return $this->where('jenis', 'misi');
    }
}