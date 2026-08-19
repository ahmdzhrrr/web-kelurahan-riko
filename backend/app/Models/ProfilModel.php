<?php

namespace App\Models;

use App\Core\Model;

class ProfilModel extends Model
{
    protected string $table = 'profil';

    protected array $fillable = [
        'judul',
        'isi',
        'gambar',
        'video_url',
        'video_file',
    ];

    public function getProfil(): array
    {
        return $this->first() ?? [];
    }
}