<?php

class Receiver
{
    public string $name;
    public string $phone;
    public string $address;
    public string $time;

    public function __construct(string $name, string $phone, string $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }
}