<?php

namespace ERM\Domains\Books\Services;

use ERM\Domains\Books\Interfaces\BooksRepositoryInterface;
use ERM\Domains\Books\Interfaces\BooksServiceInterface;

class BooksService implements BooksServiceInterface {
    protected BooksRepositoryInterface $repository;

    public function __construct(
        BooksRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }
    public function getBooks(): array {
        $books = $this->repository->getBooks();
        return $books;
    }
    public function save(array $data) {
        $this->repository->save($data);
    }
}
