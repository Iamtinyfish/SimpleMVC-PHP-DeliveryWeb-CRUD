<?php
session_start();

const APP_PATH = __DIR__ . '/app';

require_once APP_PATH . '/core/routing/Router.php';;

$router = new Router();

$router->dispatch();