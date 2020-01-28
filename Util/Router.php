<?php


namespace Util;


class Router {

    private array $routes = [
        'get' => [],
        'post' => []
    ];

    function get(string $pattern, callable $handler) {
        $this->routes['get'][$pattern] = $handler;
        return $this;
    }

    function post(string $pattern, callable $handler) {
        $this->routes['post'][$pattern] = $handler;
        return $this;
    }

    function match(Request $request) : ?callable {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            return null;
        }

        $path = $request->getPath();
        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }

        return null;
    }

}