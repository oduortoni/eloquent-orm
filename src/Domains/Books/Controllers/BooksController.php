<?php

namespace ERM\Domains\Books\Controllers;

use ERM\App\View\View;
use ERM\App\Auth\Auth;
use ERM\Domains\Books\Interfaces\BooksControllerInterface;
use ERM\Domains\Books\Interfaces\BooksServiceInterface;

class BooksController implements BooksControllerInterface {
    protected View $view;
    protected BooksServiceInterface $service;

    public function __construct(
        View $view,
        BooksServiceInterface $service,
    ) {
        $this->view = $view;
        $this->service = $service;
    }

    public function index() {
        $title = 'Books';
        $books = $this->service->getBooks();
        return $this->view->render('pages.books.index', array('title' => $title, 'books' => $books));
    }

    public function create() {
        $title = 'Create A Book';
        return $this->view->render('pages.books.create', array('title' => $title));
    }

    public function store(array $book) {
        $book['author_id'] = Auth::id() ?? 1;
        $book['publisher_id'] = 1; // Default publisher
        
        $this->service->save($book);
        return redirect('/books');
    }
}
