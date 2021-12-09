<?php

class GoodsInfo {
    private float $weight;  //kg
    private int $size;      //cm
    private string $type;

    /**
     * @param float $weight
     * @param int $size
     * @param string $type
     */

    public function __construct(float $weight, int $size, string $type)
    {
        $this->weight = $weight;
        $this->size = $size;
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}