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
        $this->assertTrue(true);
    }
}
