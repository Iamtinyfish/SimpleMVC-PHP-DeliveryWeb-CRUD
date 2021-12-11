<?php

class AdminControllerBase
{
    public function __construct() {
        $this->authentication();
    }

    public function authentication(): bool
    {
        if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') return true;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/login');
        return false;
    }
}