<?php

namespace ERM\Domains\Users\Services;

use ERM\Domains\Users\Interfaces\UserServiceInterface;
use ERM\Domains\Users\Interfaces\UserRepositoryInterface;
use ERM\App\Auth\Auth;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function register(array $data): array
    {
        $existingUser = $this->repository->findByEmail($data['email']);
        if ($existingUser) {
            throw new \Exception('Email already exists');
        }

        return $this->repository->create($data);
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->repository->findByEmail($email);
        
        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            Auth::login($user['id']);
            return true;
        }
        
        return false;
    }

    public function logout(): void
    {
        Auth::logout();
    }
}