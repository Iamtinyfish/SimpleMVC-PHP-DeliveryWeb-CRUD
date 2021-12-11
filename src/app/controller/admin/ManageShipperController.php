<?php

require_once 'AdminControllerBase.php';
require_once APP_PATH . '/controller/dao/ShipperDAO.php';
require_once APP_PATH . '/model/Shipper.php';

class ManageShipperController extends AdminControllerBase
{
    public function manage_shipper() {
        $shipperDAO = new ShipperDAO();
        $shippers = $shipperDAO->getAll();

        require_once APP_PATH . '/view/admin/ManageShipperPage.php';
        $view = new ManageShipperPage($shippers);
        $view->render();
    }

    public function search() {
        $shipperDAO = new ShipperDAO();
        $shippers = $shipperDAO->search($_GET['keyword']);

        require_once APP_PATH . '/view/admin/ManageShipperPage.php';
        $view = new ManageShipperPage($shippers);
        $view->render();
    }

    public function add() {
        $data = json_decode(file_get_contents('php://input'), true);

        $shipperDAO = new ShipperDAO();
        $status = $shipperDAO->insert((Object)$data);
        echo json_encode($status);
    }

    public function detail() {
        $shipperDAO = new ShipperDAO();
        $shipper = $shipperDAO->get($_GET['id']);
        echo json_encode($shipper);
    }

    public function update() {
        $data = json_decode(file_get_contents('php://input'), true);

        $shipperDAO = new ShipperDAO();
        $status = $shipperDAO->update((Object)$data);
        echo json_encode($status);
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $shipperDAO = new ShipperDAO();
            $status = $shipperDAO->delete($_GET['id']);
            echo json_encode($status);
        }
    }

    public function statistic() {
        $shipperDAO = new ShipperDAO();
        $statistic = $shipperDAO->getTopStat();
        echo json_encode($statistic);
    }
}