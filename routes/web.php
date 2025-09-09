<?php

use ERM\HouseKeeping\Home;
use ERM\Domains\Books\Controllers\BooksController;

$app->get("/", [Home::class, 'index']);
$app->get('/create', [Home::class, 'create']);
$app->post('/store', [Home::class, 'store']);
$app->get('/{name}/strip/{ok}', [Home::class, 'show']);

$app->get('/books/create', [BooksController::class, 'create']);
$app->post('/books/store', [BooksController::class, 'store']);
$app->get('/books', [Books::class, 'index']);