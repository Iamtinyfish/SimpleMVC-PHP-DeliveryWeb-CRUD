<?php

class Route
{
    private array $methods = array('GET','POST');
    private string $pattern;
    private string $controller;
    private string $action;
    private bool $isAdmin;

    /**
     * @param $methods
     * @param $pattern
     * @param $controller
     * @param $action
     * @param $isAdmin
     */
    public function __construct($methods,$pattern, $controller, $action,$isAdmin)
    {
        if ($methods !== null)
            $this->methods = is_array($methods) ? $methods : array($methods);

        $this->pattern = $this->process_pattern($pattern);
        $this->controller = $controller;
        $this->action = $action;
        $this->isAdmin = $isAdmin;
    }

    public function process_pattern($pattern): string
    {
        $pattern = str_replace("/","\/",$pattern);
        return '/^' . $pattern . '$/';
    }

    public function matches($uri): bool
    {
        if (preg_match($this->pattern,$uri)
            && in_array($_SERVER['REQUEST_METHOD'], $this->methods)) {
            return true;
        }
        return false;
    }

    public function exec() {
        if ($this->isAdmin)
            require_once APP_PATH . '/controller/admin/' . $this->controller . '.php';
        else
            require_once APP_PATH . '/controller/' . $this->controller . '.php';

        $controller = new ($this->controller)();
        $controller->{$this->action}();
    }
}