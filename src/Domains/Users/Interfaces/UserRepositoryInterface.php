<?php

namespace ERM\Domains\Users\Interfaces;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?array;
    public function create(array $data): array;
    public function findById(int $id): ?array;
}