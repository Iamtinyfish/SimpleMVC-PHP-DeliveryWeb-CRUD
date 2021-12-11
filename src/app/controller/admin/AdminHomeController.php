<?php

require_once 'AdminControllerBase.php';

class AdminHomeController extends AdminControllerBase {
    public function index() {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/manage-shipper');
    }

    public function dashboard() {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/manage-shipper');
    }
}
