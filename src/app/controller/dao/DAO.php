<?php
require_once PATH_APP . '/config/Config.php';

class DAO {
    public mysqli|null|false $conn;

    public function __construct() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($this->conn,'utf8');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}