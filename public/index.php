<?php
require __DIR__ . '/../bootstrap.php';

use DI\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use ERM\App\App;
use ERM\HouseKeeping\Home;
use ERM\Domains\Books\Interfaces\BooksRepositoryInterface;
use ERM\Domains\Books\Repositories\BooksRepository;
use ERM\Domains\Books\Interfaces\BooksServiceInterface;
use ERM\Domains\Books\Services\BooksService;
use ERM\Domains\Users\Interfaces\UserRepositoryInterface;
use ERM\Domains\Users\Repositories\UserRepository;
use ERM\Domains\Users\Interfaces\UserServiceInterface;
use ERM\Domains\Users\Services\UserService;

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../app.log', Logger::DEBUG));

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Psr\Log\LoggerInterface::class => $logger,
    BooksRepositoryInterface::class => \DI\autowire(BooksRepository::class),
    BooksServiceInterface::class => \DI\autowire(BooksService::class),
    UserRepositoryInterface::class => \DI\autowire(UserRepository::class),
    UserServiceInterface::class => \DI\autowire(UserService::class),
]);
$container = $containerBuilder->build();

$app = $container->get(App::class);

require __DIR__ . '/../routes/web.php';

$app->run();