<?php

require_once 'DAO.php';
require_once APP_PATH . '/model/Provider.php';

class ProviderDAO extends DAO {
    public function getAll(): array
    {
        $sql = 'SELECT * FROM `provider`;';

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $providers = [];
            while($row = $result->fetch_assoc()) {
                $provider = new Provider();
                $provider->setSummeryParam($row['provider_id'],$row['provider_name'],$row['provider_phone'],$row['provider_email']);
                array_push($providers, $provider);
            }
            return $providers;
        }
        return [];
    }

    public function search($keyword): array
    {
        $sql = '
                SELECT * FROM `provider`
                INNER JOIN `account` ON `provider`.`account_id` = `account`.`account_id`  
                ';

        if (is_int($keyword))
            $sql = $sql . 'WHERE (`provider_id` LIKE ?) OR (`provider_phone` LIKE ?);';
        else
            $sql = $sql . 'WHERE (`provider_name` LIKE ?) OR (`username` LIKE ?);';

        $stmt = $this->conn->prepare($sql);

        $keyword = '%' . $keyword . '%';

        $stmt->bind_param('ss',$keyword,$keyword);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $providers = [];
            while($row = $result->fetch_assoc()) {
                $provider = new provider();
                $provider->setSummeryParam($row['provider_id'],$row['provider_name'],$row['provider_phone'],$row['provider_email']);
                array_push($providers, $provider);
            }
            return $providers;
        }

        return [];
    }

    public function insert($provider): bool
    {
        $pepper = 'tinyfish';
        $salt = bin2hex(random_bytes(4));
        $password = md5($provider->password . $salt . $pepper);

        require_once APP_PATH . '/model/Account.php';
        $account = new Account();
        $account->setAllParam(0,$provider->username,$password,$salt,'provider');

        require_once 'AccountDAO.php';
        $accountDAO = new AccountDAO();
        if ($accountDAO->insert($account)) {
            $account_id = $accountDAO->getAccountID($account->username);

            $sql = 'INSERT INTO `provider`(`provider_name`,`provider_phone`,`provider_address`,`provider_email`,`provider_note`,`account_id`) VALUES (?,?,?,?,?,?);';

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param('sssssi',$provider->name,$provider->phone,$provider->address,$provider->note,$provider->note,$account_id);
            if ($stmt->execute()) {
                $provider_id = $this->getProviderID($account_id);
                if($this->insertStat($provider_id)) return true;
            }
        }
        return false;
    }

    public function get($id) : bool|provider {
        $sql = 'SELECT * FROM `provider` 
                INNER JOIN `account` ON `provider`.`account_id` = `account`.`account_id` 
                WHERE `provider_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('i',$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            require_once APP_PATH . '/model/Account.php';
            $account = new Account();
            $account->username = $row['username'];
            $provider = new Provider();
            $provider->setAllParam($row['provider_id'],$row['provider_name'],$row['provider_phone'],$row['provider_address'],$row['provider_email'],$row['provider_note'],$account);
            return $provider;
        }
        return false;
    }

    public function update($provider) : bool{
        $sql = 'UPDATE `provider`
                SET `provider_name` = ?, `provider_phone` = ?, `provider_address` = ?, `provider_email` = ?, `provider_note` = ?
                WHERE `provider_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('sssssi',$provider->name,$provider->phone,$provider->address,$provider->email,$provider->note,$provider->id);

        if ($stmt->execute()) return true;
        else return false;
    }

    public function delete($id) : bool{
        $sql = 'SELECT `account_id` FROM `provider` WHERE `provider_id` = ?;';

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

    public function getProviderID($account_id) : bool|int {
        $sql = 'SELECT `provider_id` FROM `provider` WHERE `account_id` = ?;';
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('i',$account_id);

        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['provider_id'];
        }
        return false;
    }

    public function insertStat($provider_id) : bool{
        $sql = 'INSERT INTO `providerstat`(`provider_id`) VALUES (?);';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('i',$provider_id);

        if ($stmt->execute()) return true;

        return false;
    }

    public function getTopStat()
    {
        $sql = 'SELECT * FROM `provider` 
                INNER JOIN `providerstat` ON `provider`.`provider_id` = `providerstat`.`provider_id` 
                ORDER BY `providerstat`.`success` DESC limit 10;';

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