<?php

namespace App\Models;

use App\Core\Model;

class UserModel extends Model
{
    protected string $table = 'users';

    protected array $fillable = [
        'nama',
        'username',
        'password',
        'email',
        'role'
    ];

    public function findByUsername(string $username): ?array
    {
        $result = $this->where('username', $username);

        return $result[0] ?? null;
    }

    public function findByEmail(string $email): ?array
    {
        $result = $this->where('email', $email);

        return $result[0] ?? null;
    }

    public function findByLogin(string $login): ?array
    {
        $user = $this->findByUsername($login);

        if ($user) {
            return $user;
        }

        return $this->findByEmail($login);
    }
}