<?php
require 'Controller.php';
class Index extends AdminController {
    public function index() {
        $this->loadView('AdminIndex');
    }
}
