<?php

namespace core;

class Router {
    public $routes = [
        'get' => [],
        'post' => [],
    ];

    public static function load($file) {
        $router = new static();
        require $file;
        return $router;
    }

    public function get($uri, $controller) {
        return $this->routes['get'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        return $this->routes['post'][$uri] = $controller; // Corrected to 'post'
    }

    public function direct($uri, $requestType) {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }

        throw new \Exception("No route defined for URI: $uri");
    }

    private function callAction($controller, $action) {
        $controller = "app\\controllers\\" . $controller;
        $controller = new $controller();

        if (!method_exists($controller, $action)) {
            throw new \Exception("Controller '$controller' does not have an action '$action'");
        }

        return $controller->$action();
    }
}
