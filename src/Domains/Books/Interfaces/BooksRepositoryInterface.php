<?php

namespace ERM\Domains\Books\Interfaces;

interface BooksRepositoryInterface {
    public function get_by_id(int $id);
    public function save(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function all(): array;
}
