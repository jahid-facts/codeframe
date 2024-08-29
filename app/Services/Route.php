<?php

namespace App\Services;

class Route
{
    private static $routes = array();
    private static $controllerNamespace = "";

    private static function add(string $uri, array $action, $method = "GET", $middleware = array())
    {
        if (!is_array($action) || count($action) !== 2) {
            throw new \InvalidArgumentException("Action must be an array with exactly two elements: controller class and method name.");
        }

        if (!is_string($action[0]) || !class_exists($action[0])) {
            throw new \InvalidArgumentException("The first element of action must be a valid controller class name.");
        }

        if (!is_string($action[1])) {
            throw new \InvalidArgumentException("The second element of action must be a string representing the method name.");
        }

        self::$routes[] = [
            'uri' => $uri,
            'controller' => $action[0],
            'action' => $action[1],
            'method' => $method,
            'middleware' => $middleware
        ];
    }

    public static function handle()
    {
        $request_path = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            // Check method
            if ($request_method !== $route['method']) {
                http_response_code(405);
                echo "405 - Method Not Allowed";
                return;
            }

            // Match route pattern with dynamic segments
            $routePattern = self::convertToRegex($route['uri']);
          
            if (preg_match($routePattern, $request_path, $matches)) {
                // Extract parameters
                array_shift($matches); // Remove the full match from the array

                foreach($route['middleware'] as $middleware) {
                    $middlewareObj = new $middleware;
                    $middlewareObj->handle();
                }

                $controller_class = self::$controllerNamespace . ucfirst($route['controller']);
                $action = $route['action'];

                $controller = new $controller_class();
                call_user_func_array([$controller, $action], $matches);
                return;
            }   
        }
        http_response_code(404);
        echo "404 - Not Found";
    }

    private static function convertToRegex($uri)
    {
        $pattern = preg_replace('/{(\w+)}/', '([^/]+)', $uri);
        return "#^$pattern$#";
    }

    public static function get(string $uri, array $action, $middleware = [])
    {
        self::add($uri, $action, "GET", $middleware);
    }

    public static function post(string $uri, array $action, $middleware = [])
    {
        self::add($uri, $action, "POST", $middleware);
    }

    public static function put(string $uri, array $action, array $middleware = [])
    {
        self::add($uri, $action, "PUT", $middleware);
    }

    public static function delete(string $uri, array $action, array $middleware = [])
    {
        self::add($uri, $action, "DELETE", $middleware);
    }

    public static function patch(string $uri, array $action, array $middleware = [])
    {
        self::add($uri, $action, "PATCH", $middleware);
    }

    // Optional: Set the controller namespace
    public static function setControllerNamespace(string $namespace)
    {
        self::$controllerNamespace = $namespace;
    }
}




    // private static function add(string $uri, array $action, string $method = "GET", array $middleware = [])
    // {
    //     // Validate the action array as before
    //     if (!is_array($action) || count($action) !== 2) {
    //         throw new \InvalidArgumentException("Action must be an array with exactly two elements: controller class and method name.");
    //     }

    //     if (!is_string($action[0]) || !class_exists($action[0])) {
    //         throw new \InvalidArgumentException("The first element of action must be a valid controller class name.");
    //     }

    //     if (!is_string($action[1])) {
    //         throw new \InvalidArgumentException("The second element of action must be a string representing the method name.");
    //     }

    //     // Prepare the route by extracting the dynamic segments
    //     $uri = preg_replace('/{([^}]+)}/', '([^/]+)', $uri);
    //     $uri = str_replace('/', '\/', $uri);

    //     self::$routes[] = [
    //         'uri' => $uri,
    //         'controller' => $action[0],
    //         'action' => $action[1],
    //         'method' => $method,
    //         'middleware' => $middleware
    //     ];
    // }

    // public static function handle()
    // {
    //     $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //     $request_method = $_SERVER['REQUEST_METHOD'];

    //     foreach (self::$routes as $route) {
    //         $pattern = '/^' . $route['uri'] . '$/';
    //         if (preg_match($pattern, $request_path, $matches) && $route['method'] == $request_method) {
    //             array_shift($matches); // Remove the full match from the matches array

    //             $controller_class = $route['controller'];
    //             $action = $route['action'];

    //             if (class_exists($controller_class) && method_exists($controller_class, $action)) {
    //                 $controller = new $controller_class();
    //                 $controller->$action(...$matches);
    //                 return;
    //             } else {
    //                 http_response_code(500);
    //                 echo "500 - Controller or action not found";
    //                 return;
    //             }
    //         }
    //     }

    //     http_response_code(404);
    //     echo "404 - Not Found";
    // }