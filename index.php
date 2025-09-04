<?php
declare(strict_types=1);

require __DIR__ . '/../bootstrap.php';

use DI\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\App;

// Set up Monolog
$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(__DIR__ . '/app.log', Logger::DEBUG));

// Set up PHP-DI container
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Psr\Log\LoggerInterface::class => $logger,
]);
$container = $containerBuilder->build();

// Get App from container and run
$app = $container->get(App::class);
$app->run();
