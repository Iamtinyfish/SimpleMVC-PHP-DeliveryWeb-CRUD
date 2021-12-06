<?php

class AdminControllerBase
{
    public array $__content = [];

    public function loadView(string $view, $data = []) {
        extract($data);
        ob_start();
        require_once PATH_APP . '/view/admin/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        $this->__content[] = $content;
        foreach ($this->__content as $html){
            echo $html;
        }
    }

    public function authentication(): bool
    {
        if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') return true;
        header('Location: http://' . $_SERVER['HTTP_HOST']);
        return false;
    }
}