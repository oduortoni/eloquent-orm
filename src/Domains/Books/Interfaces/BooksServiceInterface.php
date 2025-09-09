<?php

namespace ERM\Domains\Books\Interfaces;

interface BooksServiceInterface
{
    public function getBooks(): array;
    public function save(array $data);
}