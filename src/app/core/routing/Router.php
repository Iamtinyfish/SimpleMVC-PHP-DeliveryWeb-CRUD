<?php

require_once 'RoutesCollection.php';
require_once APP_PATH . '/config/Routes.php';

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

        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/404');
    }
}