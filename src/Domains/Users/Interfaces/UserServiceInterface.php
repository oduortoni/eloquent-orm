<?php

namespace ERM\Domains\Users\Interfaces;

interface UserServiceInterface
{
    public function register(array $data): array;
    public function login(string $email, string $password): bool;
    public function logout(): void;
}