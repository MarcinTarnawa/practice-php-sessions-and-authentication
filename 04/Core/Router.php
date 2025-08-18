<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {

    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => Null
        ];
    return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
     
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
     
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
     
    public function log($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                    Middleware::resolve($route['middleware']);
                     if ($route['middleware'] === 'log') {
                    Middleware::$log[] = base_path($route['controller']);
                }
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404) {

        http_response_code($code);
    
        require base_path("views/{$code}.php");
     
        die();
    }
}