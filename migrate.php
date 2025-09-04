<?php

require __DIR__ . '/vendor/autoload.php';

// Add missing Laravel helper
if (!function_exists('base_path')) {
    function base_path($path = '') {
        return __DIR__ . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Schema;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => realpath(__DIR__) . '/database/database.sqlite',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// set up schema facade
Facade::setFacadeApplication(['db.schema' => $capsule->getConnection()->getSchemaBuilder()]);

$migrationsPath = __DIR__ . '/database/migrations';
$files = glob($migrationsPath . '/*.php');

foreach ($files as $file) {
    echo "Running migration: " . basename($file) . "\n";
    $migration = require $file;
    $migration->down();
    $migration->up();
    echo "Completed: " . basename($file) . "\n";
}

echo "All migrations completed!\n";