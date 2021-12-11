<?php


class Shipper {
    public int $id;
    public string $name;
    public string $birthday;
    public string $IDCard;
    public string $phone;
    public string $address;
    public string $vehicle;
    public string $licensePlate;
    public string $note;
    public Account $account;

    public function setAllParam(int $id, string $name, string $birthday, string $IDCard, string $phone,
                                string $address, string $vehicle, string $licensePlate,$note, Account $account)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->IDCard = $IDCard;
        $this->phone = $phone;
        $this->address = $address;
        $this->vehicle = $vehicle;
        $this->licensePlate = $licensePlate;
        if ($note !== null) $this->note = $note;
        $this->account = $account;
    }

    public function setSummeryParam(int $id,string $name,string $phone,string $vehicle,string $licensePlate) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->vehicle = $vehicle;
        $this->licensePlate = $licensePlate;
    }
}