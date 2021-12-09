<?php

class Receiver
{
    private string $name;
    private string $phone;
    private string $address;
    private datetime $time;

    /**
     * @param string $name
     * @param string $phone
     * @param string $address
     */
    public function __construct(string $name, string $phone, string $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
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
     * @return datetime
     */
    public function getTime(): datetime
    {
        return $this->time;
    }

    /**
     * @param datetime $time
     */
    public function setTime(datetime $time): void
    {
        $this->time = $time;
    }


}