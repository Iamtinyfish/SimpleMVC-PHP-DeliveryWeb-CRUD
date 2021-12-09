<?php

require_once 'Account.php';

class Provider {
    private int $id;
    private string $name;
    private string $phone;
    private string $address;
    private string $email;
    private Account $account;
    private string $note;

    /**
     * @param int $id
     * @param string $name
     * @param string $phone
     * @param string $address
     * @param string $email
     * @param Account $account
     * @param GoodsInfo $products
     * @param string $note
     */
    public function __construct(int $id, string $name, string $phone, string $address, string $email, Account $account, GoodsInfo $products, string $note)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->account = $account;
        $this->products = $products;
        $this->note = $note;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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

    /**
     * @return GoodsInfo
     */
    public function getProducts(): GoodsInfo
    {
        return $this->products;
    }

    /**
     * @param GoodsInfo $products
     */
    public function setProducts(GoodsInfo $products): void
    {
        $this->products = $products;
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
}
