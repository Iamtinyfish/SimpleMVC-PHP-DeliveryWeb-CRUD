<?php
const PATH_APP = __DIR__ . '/app';

// get config
require (PATH_APP . '/config.php');

//URL pattern: domain.com/admin.php?c={controller}&a={action}

// If you don't pass the controller, get the default controller
$controllerName = empty($_GET['c']) ? ADMIN_CONTROLLER_DEFAULT : $_GET['c'];
$controllerPath = PATH_APP . '/controller/admin/' . $controllerName .'.php';
// If you don't pass the action, get the default action
$action = empty($_GET['a']) ? ADMIN_ACTION_DEFAULT : $_GET['a'];

if (!file_exists($controllerPath)) {
    die ('Controller file does not exist!');
}

include $controllerPath;

if (!class_exists($controllerName)){
    die ('Controller class does not exist!');
}

$controller = new $controllerName();

if (!method_exists($controller, $action)){
    die ('Action does not exist!');
}

// call action
$controller->{$action}();