<?php
class Shipper {
    private $id;
    private $name;
    private $birthday;
    private $IDCard;
    private $phone;
    private $address;
    private $vehicle;
    private $licensePlate;
    private $note;
    private $account;

    /**
     * @param $id
     * @param $name
     * @param $birthday
     * @param $IDCard
     * @param $phone
     * @param $address
     * @param $vehicle
     * @param $licensePlate
     * @param $note
     * @param $account
     */
    public function __construct($id, $name, $birthday, $IDCard, $phone, $address, $vehicle, $licensePlate, $note, $account)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->IDCard = $IDCard;
        $this->phone = $phone;
        $this->address = $address;
        $this->vehicle = $vehicle;
        $this->licensePlate = $licensePlate;
        $this->note = $note;
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getIDCard()
    {
        return $this->IDCard;
    }

    /**
     * @param mixed $IDCard
     */
    public function setIDCard($IDCard): void
    {
        $this->IDCard = $IDCard;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param mixed $vehicle
     */
    public function setVehicle($vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return mixed
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * @param mixed $licensePlate
     */
    public function setLicensePlate($licensePlate): void
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account): void
    {
        $this->account = $account;
    }

}
?>