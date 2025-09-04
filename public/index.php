<?php
require __DIR__ . '/../bootstrap.php';

use DI\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use ERM\App\App;
use ERM\HouseKeeping\Home;

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../app.log', Logger::DEBUG));

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Psr\Log\LoggerInterface::class => $logger,
]);
$container = $containerBuilder->build();

$app = $container->get(App::class);

$app->get("/", [Home::class, 'index']);
$app->get('/create', [Home::class, 'create']);
$app->post('/store', [Home::class, 'store']); 

$app->run();
