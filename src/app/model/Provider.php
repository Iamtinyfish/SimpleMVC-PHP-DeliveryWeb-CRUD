<?php

require_once 'Account.php';

class Provider {
    public int $id;
    public string $name;
    public string $phone;
    public string $address;
    public string $email;
    public Account $account;
    public string $note;

    public function setAllParam(int $id, string $name, string $phone, string $address, string $email, string $note, Account $account)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->account = $account;
        $this->note = $note;
    }


    public function setSummeryParam(int $id,string $name,string $phone,string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
}
