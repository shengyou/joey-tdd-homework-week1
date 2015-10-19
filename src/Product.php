<?php

namespace App;


class Product
{
    protected $cost;
    protected $revenue;
    protected $sellPrice;

    public function __construct($cost, $revenue, $sellPrice)
    {
        $this->cost = $cost;
        $this->revenue = $revenue;
        $this->sellPrice = $sellPrice;
    }

    public function getCost()
    {
        return $this->cost;
    }
}
