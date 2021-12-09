<?php

class Order {
    private int $id;
    private Sender $sender;
    private Receiver $receiver;
    private GoodsInfo $goodsInfo;
    private int $COD;
    private int $cost;
    private string $note;
    private string $status;
    private Provider $provider;
    private Shipper $shipper;

    public function __construct()
    {
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
     * @return Sender
     */
    public function getSender(): Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     */
    public function setSender(Sender $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return Receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * @param Receiver $receiver
     */
    public function setReceiver(Receiver $receiver): void
    {
        $this->receiver = $receiver;
    }

    /**
     * @return GoodsInfo
     */
    public function getGoodsInfo(): GoodsInfo
    {
        return $this->goodsInfo;
    }

    /**
     * @param GoodsInfo $goodsInfo
     */
    public function setGoodsInfo(GoodsInfo $goodsInfo): void
    {
        $this->goodsInfo = $goodsInfo;
    }

    /**
     * @return int
     */
    public function getCOD(): int
    {
        return $this->COD;
    }

    /**
     * @param int $COD
     */
    public function setCOD(int $COD): void
    {
        $this->COD = $COD;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Provider
     */
    public function getProvider(): Provider
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     */
    public function setProvider(Provider $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return Shipper
     */
    public function getShipper(): Shipper
    {
        return $this->shipper;
    }

    /**
     * @param Shipper $shipper
     */
    public function setShipper(Shipper $shipper): void
    {
        $this->shipper = $shipper;
    }
}