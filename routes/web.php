<?php

use ERM\HouseKeeping\Home;
use ERM\Domains\Books\Controllers\BooksController;
use ERM\Domains\Users\Controllers\AuthController;

$app->get("/", [Home::class, 'index']);
$app->get('/create', [Home::class, 'create']);
$app->post('/store', [Home::class, 'store']);
$app->get('/{name}/strip/{ok}', [Home::class, 'show']);

$app->get('/books/create', [BooksController::class, 'create']);
$app->post('/books/store', [BooksController::class, 'store']);

$app->get('/login', [AuthController::class, 'showLogin']);
$app->post('/login', [AuthController::class, 'login']);
$app->get('/register', [AuthController::class, 'showRegister']);
$app->post('/register', [AuthController::class, 'register']);
$app->post('/logout', [AuthController::class, 'logout']);