<?php
namespace App\Core;


class Router {

    public $routes = [];

    public static function loadRoutes()
    {
        $router = new self;

        require_once "routes.php";

        return $router;
    }

    public function get($route, $controller)
    {
        $this->routes['GET'][$route] = $controller;
    }

    public function post($route, $controller)
    {
        $this->routes['POST'][$route] = $controller;
    }

    public function direct($uri, $method)
    {

        if(array_key_exists($uri, $this->routes[$method])) {

            $controllerArr = explode("@", $this->routes[$method][$uri]);
            return $this->call(...$controllerArr);

        }

        return $this->call('PagesController','error404');
    }

    protected function call($controllerName, $methodName) {

        $controllerName= "App\\Controllers\\" .$controllerName;
        $controller = new $controllerName;
        if( !method_exists($controller, $methodName)) {
            throw new \Exception('This method does not exist on a controller');
        }
        return $controller->$methodName();

    }
}


