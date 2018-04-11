<?php

namespace PHPUnit\Example\Tests;

class ExampleTest extends BaseTestCase
{
    /**
     * 建構式
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * 解構式
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Arrange：定義要使用的資料
        $originNumber = 1;
        $addedNumber = 2;
        $expectResult = 3;

        // Act：定義要執行的動作
        $actingResult = $this->add($originNumber, $addedNumber);

        // Assert：斷言執行的結果
        $this->assertEquals($expectResult, $actingResult);
    }

    /**
     * add a and b
     * @param int $a
     * @param int $b
     */
    public function add(int $a, int $b)
    {
        return $a + $b;
    }
}
