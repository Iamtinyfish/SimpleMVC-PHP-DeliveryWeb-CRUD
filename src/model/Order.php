<?php
class Order {
    private $id;
    private $provider;
    private $receiverName;
    private $receiverPhone;
    private $receiverAddress;
    private $receiverTime;
    private $shipProduct;
    private $cost;
    private $isCOD;
    private $status;
    private $shipper;
    private $note;

    /**
     * @param $id
     * @param $provider
     * @param $receiverName
     * @param $receiverPhone
     * @param $receiverAddress
     * @param $receiverTime
     * @param $shipProduct
     * @param $cost
     * @param $isCOD
     * @param $status
     * @param $shipper
     * @param $note
     */
    public function __construct($id, $provider, $receiverName, $receiverPhone, $receiverAddress,
                                $receiverTime, $shipProduct, $cost, $isCOD, $status, $shipper, $note)
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
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * @param mixed $receiverName
     */
    public function setReceiverName($receiverName): void
    {
        $this->receiverName = $receiverName;
    }

    /**
     * @return mixed
     */
    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    /**
     * @param mixed $receiverPhone
     */
    public function setReceiverPhone($receiverPhone): void
    {
        $this->receiverPhone = $receiverPhone;
    }

    /**
     * @return mixed
     */
    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    /**
     * @param mixed $receiverAddress
     */
    public function setReceiverAddress($receiverAddress): void
    {
        $this->receiverAddress = $receiverAddress;
    }

    /**
     * @return mixed
     */
    public function getReceiverTime()
    {
        return $this->receiverTime;
    }

    /**
     * @param mixed $receiverTime
     */
    public function setReceiverTime($receiverTime): void
    {
        $this->receiverTime = $receiverTime;
    }

    /**
     * @return mixed
     */
    public function getShipProduct()
    {
        return $this->shipProduct;
    }

    /**
     * @param mixed $shipProduct
     */
    public function setShipProduct($shipProduct): void
    {
        $this->shipProduct = $shipProduct;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getIsCOD()
    {
        return $this->isCOD;
    }

    /**
     * @param mixed $isCOD
     */
    public function setIsCOD($isCOD): void
    {
        $this->isCOD = $isCOD;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param mixed $shipper
     */
    public function setShipper($shipper): void
    {
        $this->shipper = $shipper;
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

}
?>