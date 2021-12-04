<?php
class Order {
    private int $id;
    private Provider $provider;
    private string $receiverName;
    private string $receiverPhone;
    private string $receiverAddress;
    private string $receiverTime;
    private ShipProduct $shipProduct;
    private float $cost;
    private bool $isCOD;
    private string $status;
    private Shipper $shipper;
    private string $note;

    /**
     * @param int $id
     * @param Provider $provider
     * @param string $receiverName
     * @param string $receiverPhone
     * @param string $receiverAddress
     * @param string $receiverTime
     * @param ShipProduct $shipProduct
     * @param float $cost
     * @param bool $isCOD
     * @param string $status
     * @param Shipper $shipper
     * @param string $note
     */



    public function __construct(int $id, Provider $provider, string $receiverName, string $receiverPhone, string $receiverAddress, string $receiverTime, ShipProduct $shipProduct, float $cost, bool $isCOD, string $status, Shipper $shipper, string $note)
    {
        $this->id = $id;
        $this->provider = $provider;
        $this->receiverName = $receiverName;
        $this->receiverPhone = $receiverPhone;
        $this->receiverAddress = $receiverAddress;
        $this->receiverTime = $receiverTime;
        $this->shipProduct = $shipProduct;
        $this->cost = $cost;
        $this->isCOD = $isCOD;
        $this->status = $status;
        $this->shipper = $shipper;
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
     * @return string
     */
    public function getReceiverName(): string
    {
        return $this->receiverName;
    }

    /**
     * @param string $receiverName
     */
    public function setReceiverName(string $receiverName): void
    {
        $this->receiverName = $receiverName;
    }

    /**
     * @return string
     */
    public function getReceiverPhone(): string
    {
        return $this->receiverPhone;
    }

    /**
     * @param string $receiverPhone
     */
    public function setReceiverPhone(string $receiverPhone): void
    {
        $this->receiverPhone = $receiverPhone;
    }

    /**
     * @return string
     */
    public function getReceiverAddress(): string
    {
        return $this->receiverAddress;
    }

    /**
     * @param string $receiverAddress
     */
    public function setReceiverAddress(string $receiverAddress): void
    {
        $this->receiverAddress = $receiverAddress;
    }

    /**
     * @return string
     */
    public function getReceiverTime(): string
    {
        return $this->receiverTime;
    }

    /**
     * @param string $receiverTime
     */
    public function setReceiverTime(string $receiverTime): void
    {
        $this->receiverTime = $receiverTime;
    }

    /**
     * @return ShipProduct
     */
    public function getShipProduct(): ShipProduct
    {
        return $this->shipProduct;
    }

    /**
     * @param ShipProduct $shipProduct
     */
    public function setShipProduct(ShipProduct $shipProduct): void
    {
        $this->shipProduct = $shipProduct;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return bool
     */
    public function isCOD(): bool
    {
        return $this->isCOD;
    }

    /**
     * @param bool $isCOD
     */
    public function setIsCOD(bool $isCOD): void
    {
        $this->isCOD = $isCOD;
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