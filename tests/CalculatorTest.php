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
        // todo by joey:
        // products 的 cost, revenue, sellPrice 在需求與domain上，並沒有一定要連號，應該是獨立存在的。所以不建議 products 用 foreach 塞。這樣描述需求會變成另外一種意思。
        // 而且上課不是提到，測試程式中，幾乎不會用到 for 跟 if...
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
        // todo by joey, calculateGroupCost() API的設計，代表未來如果新增別的 property, 想要取得新的總和，就得新增一個 function
        // 就API設計上的擴充性來說，比較沒這麼有彈性。
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
