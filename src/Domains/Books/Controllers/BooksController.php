<?php

namespace ERM\Domains\Books\Controllers;

use ERM\App\View\View;
use ERM\Domains\Books\Interfaces\BooksControllerInterface;

class BooksController implements BooksControllerInterface {
    public function create() {
        $title = 'Create A Book';
        return View::render('pages.books.create', array('title' => $title));
    }
    public function store() {
        //
    }
}