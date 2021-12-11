<?php

class Account {
    public int $id;
    public string $username;
    public string $password;
    public string $salt;
    public string $role;

    public function setAllParam(int $id, string $username, string $password, string $salt, string $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->role = $role;
    }
}
