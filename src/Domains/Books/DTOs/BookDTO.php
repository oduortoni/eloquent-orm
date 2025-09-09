<?php

namespace ERM\Domains\Books\DTOs;

class BookDTO {
    public string $title;
    public string $description;
    public int $pages_count;
    public string $isbn;
    public int $author_id;
    public ?int $id;

    public function __construct(string $title, string $description, int $pages_count, string $isbn, int $author_id, ?int $id) {
        $this->title = $title;
        $this->description = $description;
        $this->pages_count = $pages_count;
        $this->isbn = $isbn;
        $this->author_id = $author_id;
        $this->id = $id;
    }

    public function fromArray(array $data) {
        return new BookDTO(
            $data['title'],
            $data['description'],
            $data['pages_count'],
            $data['isbn'],
            $data['author_id']
        );
    }

    public function toArray(): array {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'pages_count' => $this->pages_count,
            'isbn' => $this->isbn,
            'author_id' => $this->author_id
        ];
    }
}
