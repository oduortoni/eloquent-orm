<?php

namespace ERM\Domains\Books\Controllers;

use ERM\App\Auth\Auth;
use ERM\App\Controllers\Controller;
use ERM\Domains\Books\Interfaces\BooksControllerInterface;
use ERM\Domains\Books\Interfaces\BooksServiceInterface;
use Psr\Log\LoggerInterface;

class BooksController extends Controller implements BooksControllerInterface
{
    protected BooksServiceInterface $service;

    public function __construct(
        BooksServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function index(): string
    {
        $title = 'Books';
        $books = $this->service->getBooks();

        return $this->view('pages.books.index', [
            'title' => $title,
            'books' => $books,
        ]);
    }

    public function create(): string
    {
        $title = 'Create A Book';
        return $this->view('pages.books.create', [
            'title' => $title,
        ]);
    }

    public function store(array $book): void
    {
        $book['author_id'] = Auth::id() ?? 1;

        $this->service->save($book);
        $this->redirect("/books");
    }
}
