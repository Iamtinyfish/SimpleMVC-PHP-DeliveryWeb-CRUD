<?php
require 'DAO.php';

class AccountDAO extends DAO {

    public function get($username) : bool|Account {
        $sql = 'SELECT * FROM `account` WHERE `username` = ?;';
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('s',$username);

        $statement->execute();
        $result = $statement->get_result();

        $this->conn->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Account($row['account_id'],$row['username'],$row['password'],$row['salt'],$row['role']);
        }
        return false;
    }
}