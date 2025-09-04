<?php

namespace App\HouseKeeping;

class HouseKeeping {
    public function __construct() {
        $this->init();
    }

    private function init() {
        // Always render 404 for now
        self::render_404();
    }

    public static function render_404() {
        http_response_code(404);
        header('Content-Type: text/html');
        ob_start();
        include __DIR__ . '/views/404.php';
        $content = ob_get_clean();
        echo $content;
        die;
    }
}
