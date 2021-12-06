<?php


class Shipper {
    private int $id;
    private string $name;
    private string $birthday;
    private string $IDCard;
    private string $phone;
    private string $address;
    private string $vehicle;
    private string $licensePlate;
    private string $note;
    private Account $account;

    /**
     * @param int $id
     * @param string $name
     * @param string $birthday
     * @param string $IDCard
     * @param string $phone
     * @param string $address
     * @param string $vehicle
     * @param string $licensePlate
     * @param string $note
     * @param Account $account
     */
    public function __construct(int $id, string $name, string $birthday, string $IDCard, string $phone, string $address, string $vehicle, string $licensePlate, string $note, Account $account)
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getIDCard(): string
    {
        return $this->IDCard;
    }

    /**
     * @param string $IDCard
     */
    public function setIDCard(string $IDCard): void
    {
        $this->IDCard = $IDCard;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getVehicle(): string
    {
        return $this->vehicle;
    }

    /**
     * @param string $vehicle
     */
    public function setVehicle(string $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return string
     */
    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    /**
     * @param string $licensePlate
     */
    public function setLicensePlate(string $licensePlate): void
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }


}