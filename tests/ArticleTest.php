<?php

namespace PHPUnit\Example\Tests;

/**
 * 測試文章資料的 CRUD
 * @package PHPUnit\Example\Tests
 */
class ArticleTest extends BaseTestCase
{
    protected $article;

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
     * Create Article Test
     *
     * @return void
     */
    public function test_測試新增一篇文章() // or test_a_article, testArticleAddingTest
    {
        // Arrange：定義要使用的資料

        // Act：定義要執行的動作

        // Assert：斷言執行的結果
    }
}
