<?php

require __DIR__ . '/vendor/autoload.php';

use ERM\App\Session\Session;
Session::start();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'   => 'sqlite',
    'database' => __DIR__ . '/database/database.sqlite',
    'prefix'   => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
