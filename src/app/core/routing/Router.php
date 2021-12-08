<?php

require_once 'RoutesCollection.php';
require_once PATH_APP . '/config/Routes.php';

class Router
{
    private string $uri;

    public function __construct()
    {
        $this->uri = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');

    }

    public function dispatch()
    {
        foreach (RoutesCollection::$routes as $route) {
            if ($route->matches($this->uri)) {
                $route->exec();
                return;
            }
        }

        die('not found route!');
//        throw new RouteNotFoundException("No routes matching {$this->path}");
    }
}