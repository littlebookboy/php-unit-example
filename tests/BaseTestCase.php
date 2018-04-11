<?php

namespace PHPUnit\Example\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
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
}

