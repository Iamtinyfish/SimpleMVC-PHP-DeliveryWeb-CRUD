<?php

require_once 'AdminControllerBase.php';

class AdminHomeController extends AdminControllerBase {
    public function index() {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/dashboard');
    }

    public function dashboard() {
        if ($this->authentication()) {
            require_once 'ManageShipperController.php';
            $controller = new ManageShipperController();
            $controller->manage_shipper();
        }
    }
}
