<?php

namespace ERM\App\Controllers;

use Psr\Log\LoggerInterface;

class Controller
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}