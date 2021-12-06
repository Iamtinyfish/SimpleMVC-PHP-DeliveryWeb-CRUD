<?php


class ControllerBase
{
    public array $__content;

    public function loadView(string $view, $data = []) {
        $viewPath = PATH_APP . '/view/' . $view . '.php';
        if (file_exists($viewPath)) {
            ob_start();
            if (!empty($data)) extract($data);
            require_once $viewPath;
            $content = ob_get_contents();
            ob_end_clean();
        }

        $this->__content = array($content);
        foreach ($this->__content as $html){
            echo $html;
        }
    }

    public function authentication(): bool
    {
        if (isset($_SESSION['username'])) return true;
        return false;
    }
}