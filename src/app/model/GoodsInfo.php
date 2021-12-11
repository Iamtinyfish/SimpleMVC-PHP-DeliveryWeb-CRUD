<?php

class GoodsInfo {
    public float $weight;  //kg
    public int $size;      //cm
    public string $type;

    public function __construct(float $weight, int $size, string $type)
    {
        $this->weight = $weight;
        $this->size = $size;
        $this->type = $type;
    }
}