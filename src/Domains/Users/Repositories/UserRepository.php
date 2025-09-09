<?php

namespace ERM\Domains\Users\Repositories;

use ERM\Domains\Users\Interfaces\UserRepositoryInterface;
use ERM\Domains\Users\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): ?array
    {
        $user = User::where('email', $email)->first();
        return $user ? $user->toArray() : null;
    }

    public function create(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
        
        return $user->toArray();
    }

    public function findById(int $id): ?array
    {
        $user = User::find($id);
        return $user ? $user->toArray() : null;
    }
}