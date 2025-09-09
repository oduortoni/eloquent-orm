<?php

namespace ERM\App\View;

class View
{
    private static string $viewPath = '';

    private static function getViewPath(): string
    {
        if (empty(self::$viewPath)) {
            self::$viewPath = dirname(getcwd()) . '/resources/views';
        }
        return self::$viewPath;
    }

    public static function render(string $view, array $data = []): string
    {
        $viewFile = self::getViewPath() . '/' . str_replace('.', '/', $view) . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \Exception("View file not found: {$viewFile}");
        }

        extract($data);
        ob_start();
        include $viewFile;
        $output = ob_get_clean();
        return $output;
    }

    public static function make(string $view, array $data = []): string
    {
        return self::render($view, $data);
    }
}