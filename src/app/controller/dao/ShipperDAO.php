<?php
require_once 'DAO.php';
require_once PATH_APP . '/model/Shipper.php';

class ShipperDAO extends DAO {
    public function getAll() {
        $sql = 'SELECT * FROM `shipper`;';

        $result = $this->conn->query($sql);

        $this->conn->close();

        if ($result->num_rows > 0) {
            $shippers = [];
            while($row = $result->fetch_assoc()) {
                $shipper = new Shipper();
                $shipper->setParamType1($row['shipper_id'],$row['shipper_name'],$row['shipper_phone'],$row['vehicle'],$row['licensePlate']);
                array_push($shippers, $shipper);
            }
            return $shippers;
        }
        return false;
    }
}