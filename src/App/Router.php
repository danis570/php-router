<?php

namespace Danish\PhpRouter\App;

class Router
{
    public static array $routes = [];

    public static function get(string $path, array $controller, array $middlewares = [])
    {
        self::$routes[] = [
            'method' => 'GET',
            'path' => $path,
            'controller' => $controller,
            'middlewares' => $middlewares,
        ];
    }

    public static function post(string $path, array $controller, array $middlewares = [])
    {
        self::$routes[] = [
            'method' => 'POST',
            'path' => $path,
            'controller' => $controller,
            'middlewares' => $middlewares,
        ];
    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['PATH_INFO'] ?? '/';

        foreach (self::$routes as $route) {
            if (
                $method == $route['method'] &&
                $path == $route['path']
            ) {
                foreach ($route['middlewares'] as $middleware) {
                    $instanceMiddleware = new $middleware();
                    $instanceMiddleware->before();
                }

                $controller = $route['controller'][0];
                $func = $route['controller'][1];

                $instance = new $controller();
                echo $instance->$func();
                return;
            }
        }

        http_response_code(404);
        echo 'Controller Not Found';

    }
}
