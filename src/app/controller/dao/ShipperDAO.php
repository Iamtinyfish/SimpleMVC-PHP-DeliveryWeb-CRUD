<?php
require_once 'DAO.php';
require_once APP_PATH . '/model/Shipper.php';

class ShipperDAO extends DAO {
    public function getAll(): array
    {
        $sql = 'SELECT * FROM `shipper`;';

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $shippers = [];
            while($row = $result->fetch_assoc()) {
                $shipper = new Shipper();
                $shipper->setSummeryParam($row['shipper_id'],$row['shipper_name'],$row['shipper_phone'],$row['vehicle'],$row['licensePlate']);
                array_push($shippers, $shipper);
            }
            return $shippers;
        }
        return [];
    }

    public function search($keyword): array
    {
        $sql = '
                SELECT * FROM `shipper`
                INNER JOIN `account` ON `shipper`.`account_id` = `account`.`account_id`  
                ';

        if (is_int($keyword))
            $sql = $sql . 'WHERE (`shipper_id` LIKE ?) OR (`shipper_IDCard` LIKE ?) OR (`shipper_phone` LIKE ?);';
        else
            $sql = $sql . 'WHERE (`shipper_name` LIKE ?) OR (`shipper_address` LIKE ?) OR (`username` LIKE ?);';

        $stmt = $this->conn->prepare($sql);

        $keyword = '%' . $keyword . '%';

        $stmt->bind_param('sss',$keyword,$keyword,$keyword);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $shippers = [];
            while($row = $result->fetch_assoc()) {
                $shipper = new Shipper();
                $shipper->setSummeryParam($row['shipper_id'],$row['shipper_name'],$row['shipper_phone'],$row['vehicle'],$row['licensePlate']);
                array_push($shippers, $shipper);
            }
            return $shippers;
        }

        return [];
    }

    public function insert($shipper): bool
    {
        $pepper = 'tinyfish';
        $salt = bin2hex(random_bytes(4));
        $password = md5($shipper->password . $salt . $pepper);

        require_once APP_PATH . '/model/Account.php';
        $account = new Account();
        $account->setAllParam(0,$shipper->username,$password,$salt,'shipper');

        require_once 'AccountDAO.php';
        $accountDAO = new AccountDAO();
        if ($accountDAO->insert($account)) {
            $account_id = $accountDAO->getAccountID($account->username);

            $sql = 'INSERT INTO `shipper`(`shipper_name`,`birthday`,`shipper_IDCard`,`shipper_phone`,`shipper_address`,`vehicle`,`licensePlate`,`shipper_note`,`account_id`) VALUES (?,?,?,?,?,?,?,?,?)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param('ssssssssi',$shipper->name,$shipper->birthday,$shipper->IDCard,$shipper->phone,
                $shipper->address,$shipper->vehicle,$shipper->licensePlate,$shipper->note,$account_id);
            if ($stmt->execute()) {
                $shipper_id = $this->getShipperID($account_id);
                if($this->insertStat($shipper_id)) return true;
            }
        }
        return false;
    }

    public function get($id) : bool|Shipper {
        $sql = 'SELECT * FROM `shipper` 
                INNER JOIN `account` ON `shipper`.`account_id` = `account`.`account_id` 
                WHERE `shipper_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('i',$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            require_once APP_PATH . '/model/Account.php';
            $account = new Account();
            $account->username = $row['username'];
            $shipper = new Shipper();
            $shipper->setAllParam($row['shipper_id'],$row['shipper_name'],$row['birthday'],$row['shipper_IDCard'],$row['shipper_phone'],
                $row['shipper_address'],$row['vehicle'],$row['licensePlate'],$row['shipper_note'],$account);
            return $shipper;
        }
        return false;
    }

    public function update($shipper) : bool{
        $sql = 'UPDATE `shipper`
                SET `shipper_name` = ?, `birthday` = ?, `shipper_IDCard` = ?, `shipper_phone` = ?, 
                    `shipper_address` = ?, `vehicle` = ?, `licensePlate` = ?, `shipper_note` = ?
                WHERE `shipper_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssssssssi',$shipper->name,$shipper->birthday,$shipper->IDCard,$shipper->phone,
                                                $shipper->address,$shipper->vehicle,$shipper->licensePlate,$shipper->note,$shipper->id);

        if ($stmt->execute()) return true;
        else return false;
    }

    public function delete($id) : bool{
        $sql = 'SELECT `account_id` FROM `shipper` WHERE `shipper_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            require_once 'AccountDAO.php';
            $accountDAO = new AccountDAO();
            return $accountDAO->delete($row['account_id']);
        }

        return false;
    }

    public function getShipperID($account_id) : bool|int {
        $sql = 'SELECT `shipper_id` FROM `shipper` WHERE `account_id` = ?;';
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('i',$account_id);

        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['shipper_id'];
        }
        return false;
    }

    public function insertStat($shipper_id) : bool{
        $sql = 'INSERT INTO `shipperstat`(`shipper_id`) VALUES (?);';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('i',$shipper_id);

        if ($stmt->execute()) return true;

        return false;
    }

    public function getTopStat()
    {
        $sql = 'SELECT * FROM `shipper` 
                INNER JOIN `shipperstat` ON `shipper`.`shipper_id` = `shipperstat`.`shipper_id` 
                ORDER BY `shipperstat`.`success` DESC limit 10;';

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $statistic = [];
            while($row = $result->fetch_assoc()) {
                array_push($statistic, $row);
            }
            return $statistic;
        }
        return false;
    }
}