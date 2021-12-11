<?php
require_once 'DAO.php';
require_once APP_PATH . '/model/Account.php';

class AccountDAO extends DAO {

    public function get($username) : bool|Account {
        $sql = 'SELECT * FROM `account` WHERE `username` = ?;';
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('s',$username);

        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $account = new Account();
            $account->setAllParam($row['account_id'],$row['username'],$row['password'],$row['salt'],$row['role']);
            return $account;
        }
        return false;
    }

    public function insert(Account $account) : bool{
        $sql = 'INSERT INTO `account`(`username`, `password`, `salt`, `role`) VALUES (?,?,?,?);';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssss',$account->username,$account->password,$account->salt,$account->role);

        if ($stmt->execute()) return true;

        return false;
    }

    public function delete($id) : bool{
        $sql = 'DELETE FROM `account` WHERE `account_id` = ?;';

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        if ($stmt->execute()) return true;

        return false;
    }

    public function getAccountID($username) : bool|int {
        $sql = 'SELECT `account_id` FROM `account` WHERE `username` = ?;';
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('s',$username);

        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['account_id'];
        }
        return false;
    }
}