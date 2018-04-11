<?php

namespace PHPUnit\Example\Tests;
use Carbon\Carbon;
use PHPUnit\Example\Article;

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
        $article = [
            'title' => $this->faker->title,
            'content' => $this->faker->realText(200),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];

        // Act：定義要執行的動作
        $result = (new Article())->create($article);

        // Assert：斷言執行的結果
        $this->assertEquals($result, $article);
    }
}
