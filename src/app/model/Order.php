<?php

require_once 'Sender.php';
require_once 'Receiver.php';
require_once 'GoodsInfo.php';
require_once 'Provider.php';
require_once 'Shipper.php';

class Order {
    public int $id;
    public Sender $sender;
    public Receiver $receiver;
    public GoodsInfo $goodsInfo;
    public int $COD;
    public int $cost;
    public string $note;
    public string $status;
    public Provider $provider;
    public Shipper $shipper;

    public function __construct() { }
}