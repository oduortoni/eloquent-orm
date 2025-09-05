<?php

namespace ERM\App\View;

class View
{
    private static string $viewPath = __DIR__ . '/../../../resources/views';

    public static function render(string $view, array $data = []): string
    {
        $viewFile = self::$viewPath . '/' . str_replace('.', '/', $view) . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \Exception("View file not found: {$viewFile}");
        }

        extract($data);
        ob_start();
        include $viewFile;
        return ob_get_clean();
    }

    public static function make(string $view, array $data = []): string
    {
        return self::render($view, $data);
    }
}