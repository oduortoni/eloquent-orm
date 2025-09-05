<?php

namespace ERM\HouseKeeping;

use ERM\App\Controllers\Controller;
use ERM\Domains\Users\User;

class Home extends Controller
{
    public function index() {
        $this->response($this->view('pages.home', ['title' => 'Home']));
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
        $name = $body['name'] ?? null;
        $email = $body['email'] ?? null;

        if (!$name || !$email) {
            echo "Name and email are required!";
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
        ]);

        $user->logCreation();

        echo "User created successfully! ID: {$user->id}";
    }

    public function show(string $name, string $ok) {
        echo "Hello, {$name} said {$ok}!";
    }
}
