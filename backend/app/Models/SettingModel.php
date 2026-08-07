<?php

namespace App\Models;

use App\Core\Model;

class SettingModel extends Model
{
    protected string $table = 'settings';

    public function getSetting(): ?array
    {
        return $this->first();
    }
}