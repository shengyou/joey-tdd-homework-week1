<?php

namespace App\Tests;

use App\Calculator;
use PHPUnit_Framework_TestCase;

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $data;

    public function setUp()
    {
        // todo by joey:
        // products 的 cost, revenue, sellPrice 在需求與domain上，並沒有一定要連號，應該是獨立存在的。所以不建議 products 用 foreach 塞。這樣描述需求會變成另外一種意思。
        // 而且上課不是提到，測試程式中，幾乎不會用到 for 跟 if...

        // refactoring by shengyou, 把 $this->data 改以 array 存入
        // 存入時透過 php 型別轉換成 object，這樣取值時可以模擬物件 property
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
        // todo by joey, calculateGroupCost() API的設計，代表未來如果新增別的 property, 想要取得新的總和，就得新增一個 function
        // 就API設計上的擴充性來說，比較沒這麼有彈性。

        // refactoring by shengyou,
        // 1. 重新將 API 設計成接受 data (array), property (string), groupBy (int) 擴增彈性
        // 2. 測試時透過 dataProvider 將設定及預期值帶入，若要增加測試樣本，則新增 dataProvider 回傳的 array 即可
        $actual = $calculator->calculateSumByPropertyAndGroup($this->data, $property, $groupBy);

        // Assert
        $this->assertEquals($expected, $actual);
    }

}
