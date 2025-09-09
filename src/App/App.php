<?php
declare(strict_types=1);

namespace ERM\App;

use DI\Container;
use Psr\Log\LoggerInterface;

use ERM\HouseKeeping\Errors;

class App
{
    private array $routes = [];
    private Container $container;
    private LoggerInterface $logger;

    public function __construct(Container $container, LoggerInterface $logger)
    {
        $this->container = $container;
        $this->logger = $logger;
    }

    public function run(): void
    {
        $this->logger->info("App is running!");

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if (!in_array($method, ['GET', 'POST'])) {
            Errors::render_405();
            return;
        }

        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH);

        $handler = null;
        $params = [];

        if (!empty($this->routes[$method])) {
            foreach ($this->routes[$method] as $pattern => $routeHandler) {
                if (preg_match($pattern, $uri, $matches)) {
                    $handler = $routeHandler;
                    foreach ($matches as $key => $value) {
                        if (is_string($key)) {
                            $params[$key] = $value;
                        }
                    }
                    break;
                }
            }
        }

        if (!$handler) {
            Errors::render_404();
            return;
        }

        // parse JSON body and add as last argument
        if ($method === 'POST') {
            $body = $_POST;

            if (empty($body) && str_contains($_SERVER['CONTENT_TYPE'] ?? '', 'application/json')) {
                $raw = file_get_contents('php://input');
                $body = json_decode($raw, true) ?? [];
            }

            var_dump($body);

            $params['body'] = $body;
        }

        if (is_array($handler)) {
            [$class, $method] = $handler;
            $controller = $this->container->get($class);
            $response = $controller->$method(...$params);
            echo $response;
        } else {
            $response = $handler(...$params);
            echo $response;
        }
    }

    public function get(string $path, callable|array $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute(string $method, string $path, callable|array $handler): void
    {
        if (!in_array($method, ['GET', 'POST'])) {
            throw new \InvalidArgumentException("Only GET and POST are allowed");
        }

        // Convert {param} to regex
        $pattern = preg_replace('#\{([\w]+)\}#', '(?P<$1>[^/]+)', $path);
        $pattern = "#^" . $pattern . "$#";

        $this->routes[$method][$pattern] = $handler;
    }
}
