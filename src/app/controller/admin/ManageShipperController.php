<?php

require_once 'AdminControllerBase.php';

class ManageShipperController extends AdminControllerBase
{
    public function manage_shipper() {
        if ($this->authentication()) {
            require_once PATH_APP . '/controller/dao/ShipperDAO.php';
            require_once PATH_APP . '/model/Shipper.php';
            $shipperDAO = new ShipperDAO();
            $shippers = $shipperDAO->getAll();
            if ($shippers === false) $shippers = [];

            require_once PATH_APP . '/view/admin/ManageShipperPage.php';
            $view = new ManageShipperPage($shippers);
            $view->render();
        }
    }
}