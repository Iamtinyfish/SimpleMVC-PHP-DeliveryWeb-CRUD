<?php
session_start();

const PATH_APP = __DIR__ . '/app';

require_once PATH_APP . '/core/routing/Router.php';;

$router = new Router();

$router->dispatch();