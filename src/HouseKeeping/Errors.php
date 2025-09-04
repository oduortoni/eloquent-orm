<?php

namespace ERM\HouseKeeping;

class Errors {
    public static function render_404() {
        http_response_code(404);
        header('Content-Type: text/html');
        ob_start();
        include __DIR__ . '/views/404.php';
        $content = ob_get_clean();
        echo $content;
        die;
    }

    public static function render_405() {
        http_response_code(405);
        header('Content-Type: text/html');
        ob_start();
        include __DIR__ . '/views/405.php';
        $content = ob_get_clean();
        echo $content;
        die;
    }
}
