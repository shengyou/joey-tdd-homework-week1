<?php

namespace App\Tests;

use App\Calculator;
use App\Product;
use PHPUnit_Framework_TestCase;

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $products = [];

    public function setUp()
    {
        foreach(range(1, 11) as $baseNumber) {
            $cost = $baseNumber;
            $revenue = $baseNumber + 10;
            $sellPrice = $baseNumber + 20;

            $this->products[] = new Product($cost, $revenue, $sellPrice);
        }
    }

    public function tearDown()
    {
        $this->products = [];
    }

    public function testGroupBy3AndCalculateGroupCost()
    {
        // Arrange
        $calculator = new Calculator();
        $expected = [6, 15, 24, 21];

        // Act
        $actual = $calculator->calculateGroupCost($this->products, 3);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    public function testGroupBy4AndCalculateGroupRevenue()
    {
        // Arrange
        $calculator = new Calculator();
        $expected = [50, 66, 60];

        // Act
        $actual = $calculator->calculateGroupRevenue($this->products, 4);

        // Assert
        $this->assertEquals($expected, $actual);
    }

}
