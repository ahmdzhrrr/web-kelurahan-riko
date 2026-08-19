<?php

namespace App\Models;

use App\Core\Model;

class KontakModel extends Model
{
    protected string $table = 'kontak';

    protected array $fillable = [
        'alamat',
        'email',
        'telepon',
        'whatsapp',
        'maps',
        'latitude',
        'longitude',
        'jam_operasional',
        'instagram',
        'facebook',
        'youtube',
        'tiktok',
        'website'
    ];

    public function getKontak(): array
    {
        return $this->first() ?? [];
    }
}