<?php

namespace ERM\HouseKeeping;

use ERM\App\Controllers\Controller;

class Home extends Controller
{
    public function index() {
        header('Content-Type: text/html');
        ob_start();
        include __DIR__ . '/views/index.php';
        $content = ob_get_clean();
        echo $content;
    }

    function create() {
        header('Content-Type: text/html');
        ob_start();
        include __DIR__ . '/views/create.php';
        $content = ob_get_clean();
        echo $content;
    }
    
    public function store(array $body)
    {
        $this->logger->info("Form submitted", $body);

        $name = $body['name'] ?? null;
        $email = $body['email'] ?? null;

        if (!$name || !$email) {
            echo "Name and email are required!";
            return;
        }

        echo "Form submitted successfully! Name: {$name}, Email: {$email}";
    }
}
