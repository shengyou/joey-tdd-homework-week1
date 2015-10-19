<?php

namespace App;

class Calculator
{
    public function __construct()
    {
    }

    public function calculateGroupCost(array $products, $groupBy)
    {
        $groupCost = [];
        $cost = 0;
        $i = 1;

        foreach($products as $product) {
            $cost += $product->getCost();

            if ($i == $groupBy) {
                $groupCost[] = $cost;
                $cost = 0;

                $i = 1;
            } else {
                $i++;
            }
        }

        if ($cost != 0) {
            $groupCost[] = $cost;
        }

        return $groupCost;
    }

    public function calculateGroupRevenue(array $products, $groupBy)
    {
        return [];
    }
}
