<?php


namespace Util;

/**
 * Class Router
 * Serve a creare le associazioni URL->callback, viene poi usato dal dispatcher
 * @package Util
 */

class Router {

    private array $routes = [
        'get' => [],
        'post' => []
    ];

    private $pageNotFound;

    /**
     * Associa un certo URL a una callback se viene chiamato utilizzando il metodo GET
     * @param string $pattern
     * @param callable $handler
     * @return $this Ritorna l'oggetto per permettere la concatenazione di chiamate
     */
    function get(string $pattern, callable $handler) {
        $this->routes['get'][$pattern] = $handler;
        return $this;
    }

    /**
     * * Associa un certo URL a una callback se viene chiamato utilizzando il metodo POST
     * @param string $pattern
     * @param callable $handler
     * @return $this Ritorna l'oggetto per permettere la concatenazione di chiamate
     */
    function post(string $pattern, callable $handler) {
        $this->routes['post'][$pattern] = $handler;
        return $this;
    }

    /**
     * Va a impostare che azione deve essere presa quando l'URL non viene riconosciuto
     * @param callable $handler
     */
    function setPageNotFound(callable $handler){
        $this->pageNotFound = $handler;
    }

    /**
     * Cerca all'interno delle chiamate registrate se ce n'è una che corrisponde
     * a quella richiesta, se la trova ritorna la callback registrata, altrimenti
     * ritorna la callback settata per pageNotFound
     * @param Request $request
     * @return callable|null
     */
    function match(Request $request) : ?callable {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            return $this->pageNotFound;
        }

        $path = $request->getPath();
        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }
        return $this->pageNotFound;
    }

}