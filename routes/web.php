<?php

use ERM\HouseKeeping\Home;

$app->get("/", [Home::class, 'index']);
$app->get('/create', [Home::class, 'create']);
$app->post('/store', [Home::class, 'store']);
$app->get('/{name}/strip/{ok}', [Home::class, 'show']);