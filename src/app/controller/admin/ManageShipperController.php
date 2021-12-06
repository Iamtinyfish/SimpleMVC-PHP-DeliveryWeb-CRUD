<?php

require_once 'AdminControllerBase.php';

class ManageShipperController extends AdminControllerBase
{
    public function manage_shipper() {
        if ($this->authentication())
            $this->loadView('manage-shipper');
    }
}