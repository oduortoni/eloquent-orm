<?php

namespace ERM\Domains\Books\Repositories;

use ERM\Domains\Books\Interfaces\BooksRepositoryInterface;
use ERM\Domains\Books\Models\Book;
use ERM\Domains\Books\DTOs\BookDTO;

class BooksRepository implements BooksRepositoryInterface {

    public function __construct() {}

    public function get_by_id(int $id) {
        //
    }

    public function save(array $data): BookDTO {
        $dto = new BookDTO($data['title'], $data['description'], $data['pages_count'], $data['isbn'], $data['author_id']);
        $book = new Book();

        $book->title = $dto->title;
        $book->description = $dto->description;
        $book->pages_count = $dto->pages_count;
        $book->isbn = $dto->isbn;
        $book->author_id = $dto->author_id;

        $book->save();

        return $dto;
    }

    public function update(int $id, array $data) {
        //
    }

    public function delete(int $id) {
        //
    }

    public function all(): array {
        $books = Book::all();

        $result = [];
        foreach($books as $book) {
            $dto = new BookDTO($book->title, $book->description, $book->pages_count, $book->isbn, $book->author_id, $book->id);
            $result[] = $dto->toArray();
        }

        return $result;
    }
}
