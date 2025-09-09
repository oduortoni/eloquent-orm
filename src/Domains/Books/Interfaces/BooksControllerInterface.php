<?php

namespace ERM\Domains\Books\Interfaces;

interface BooksControllerInterface {
    public function create();
    public function store(array $book);
}
