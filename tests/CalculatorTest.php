<?php

namespace App\Tests;

use App\Calculator;
use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $data;

    public function setUp()
    {
        $this->data = [
            (object) ['cost' =>  1, 'revenue' => 11, 'sellPrice' => 21],
            (object) ['cost' =>  2, 'revenue' => 12, 'sellPrice' => 22],
            (object) ['cost' =>  3, 'revenue' => 13, 'sellPrice' => 23],
            (object) ['cost' =>  4, 'revenue' => 14, 'sellPrice' => 24],
            (object) ['cost' =>  5, 'revenue' => 15, 'sellPrice' => 25],
            (object) ['cost' =>  6, 'revenue' => 16, 'sellPrice' => 26],
            (object) ['cost' =>  7, 'revenue' => 17, 'sellPrice' => 27],
            (object) ['cost' =>  8, 'revenue' => 18, 'sellPrice' => 28],
            (object) ['cost' =>  9, 'revenue' => 19, 'sellPrice' => 29],
            (object) ['cost' => 10, 'revenue' => 20, 'sellPrice' => 30],
            (object) ['cost' => 11, 'revenue' => 21, 'sellPrice' => 31],
        ];
    }

    public function tearDown()
    {
        $this->data = null;
    }

    public function calculatorDataProvider()
    {
        return [
            ['cost', 3, [6, 15, 24, 21]],
            ['revenue', 4, [50, 66, 60]],
        ];
    }

    /**
     * @dataProvider calculatorDataProvider
     */
    public function testCalculateSumByPropertyAndGroup($property, $groupBy, $expected)
    {
        // Arrange
        $calculator = new Calculator();

        // Act
        $actual = $calculator->calculateSumByPropertyAndGroup($this->data, $property, $groupBy);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionWhenInvalidArgument()
    {
        // Arrange
        $calculator = new Calculator();

        // Act
        $calculator->calculateSumByPropertyAndGroup($this->data, 'wrong_property', 3);
    }

}
