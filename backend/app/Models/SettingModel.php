<?php

namespace App\Models;

use App\Core\Model;

class SettingModel extends Model
{
    protected string $table = 'settings';

    protected array $fillable = [
        'site_name',
        'site_subtitle',
        'tagline',
        'logo',
        'favicon',
        'hero_title',
        'hero_subtitle',
        'footer',
        'copyright',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'maintenance_mode',
        'kecamatan',
        'tipologi',
        'luas_wilayah'
    ];

    public function getSetting(): array
    {
        return $this->first() ?? [];
    }
}