<?php

namespace ERM\App\Controllers;

use Psr\Log\LoggerInterface;
use ERM\App\View\View;

class Controller
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    protected function view(string $view, array $data = []): string
    {
        return View::render($view, $data);
    }

    protected function response(string $content, int $status = 200): void
    {
        http_response_code($status);
        echo $content;
    }
}