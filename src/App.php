<?php
declare(strict_types=1);

namespace App;

use Psr\Log\LoggerInterface;

class App
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run(): void
    {
        $this->logger->info("App is running!");
        echo "Hello, World!\n";
    }
}
