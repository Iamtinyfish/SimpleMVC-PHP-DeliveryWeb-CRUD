<?php

require_once 'AdminControllerBase.php';
require_once APP_PATH . '/controller/dao/ProviderDAO.php';
require_once APP_PATH . '/model/Provider.php';

class ManageProviderController
{
    public function manage_provider() {
        $providerDAO = new providerDAO();
        $providers = $providerDAO->getAll();

        require_once APP_PATH . '/view/admin/ManageProviderPage.php';
        $view = new ManageProviderPage($providers);
        $view->render();
    }

    public function search() {
        $providerDAO = new ProviderDAO();
        $providers = $providerDAO->search($_GET['keyword']);

        require_once APP_PATH . '/view/admin/ManageProviderPage.php';
        $view = new ManageProviderPage($providers);
        $view->render();
    }

    public function add() {
        $data = json_decode(file_get_contents('php://input'), true);

        $providerDAO = new ProviderDAO();
        $status = $providerDAO->insert((Object)$data);
        echo json_encode($status);
    }

    public function detail() {
        $providerDAO = new ProviderDAO();
        $provider = $providerDAO->get($_GET['id']);
        echo json_encode($provider);
    }

    public function update() {
        $data = json_decode(file_get_contents('php://input'), true);

        $providerDAO = new ProviderDAO();
        $status = $providerDAO->update((Object)$data);
        echo json_encode($status);
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $providerDAO = new ProviderDAO();
            $status = $providerDAO->delete($_GET['id']);
            echo json_encode($status);
        }
    }

    public function statistic() {
        $providerDAO = new ProviderDAO();
        $statistic = $providerDAO->getTopStat();
        echo json_encode($statistic);
    }
}