<?php

namespace App\Entities;

class Rate
{
    private $currency;
    private $price;
    private $symbol;

    /**
     * Rate constructor.
     * @param string $currency
     * @param float $price
     * @param string $symbol
     */
    public function __construct(string $currency, float $price, string $symbol)
    {
        $this->currency = $currency;
        $this->price = $price;
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    public function getMarkupPrice(): float
    {
        return $this->price + $this->price * config('rate.percent') / 100;
    }

    public function getSymbol(): string
    {
        return  $this->symbol;
    }
}
