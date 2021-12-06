<?php
require_once 'Route.php';

class RoutesCollection
{
    public static array $routes = [];

    public static function add($method,$pattern,$controller,$action,$isAdmin = false)
    {
        RoutesCollection::$routes[] = new Route($method,$pattern,$controller,$action,$isAdmin);
    }

    public static function get($pattern,$controller,$action,$isAdmin = false)
    {
        RoutesCollection::$routes[] = new Route('GET',$pattern,$controller,$action,$isAdmin);
    }

    public static function post($pattern,$controller,$action,$isAdmin = false)
    {
        RoutesCollection::$routes[] = new Route('POST',$pattern,$controller,$action,$isAdmin);
    }

    public static function any($pattern,$controller,$action,$isAdmin = false)
    {
        RoutesCollection::$routes[] = new Route(null,$pattern,$controller,$action,$isAdmin);
    }
}