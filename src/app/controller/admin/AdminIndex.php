<?php
require 'AdminController.php';
class AdminIndex extends AdminController {
    public function adminIndex() {
        $this->loadView('admin-dashboard');
    }
}
