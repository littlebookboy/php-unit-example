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
        $getData = (new Article())->get($result['last_insert_id']);

        // Assert：斷言執行的結果
        $this->assertEquals($article['title'], $getData['title']);
        $this->assertEquals($article['content'], $getData['content']);
        $this->assertEquals($article['created_at'], $getData['created_at']);
        $this->assertEquals($article['updated_at'], $getData['updated_at']);
    }

    /**
     * Update Article Test
     *
     * @return void
     */
    public function test_測試修改一篇文章()
    {
        // Arrange：定義要使用的資料
        // 準備要被讀取的資料對象
        $title = '單元測試練習';
        $content = $this->faker->realText(200);
        $updateTitle = '古月仙人';
        $updateContent = '世外悠悠隔人間，不忍淒淒亂世煙。慨懷瀟瀟任風逝，雲靄冉冉繞仙山';
        $article = [
            'id' => 1,
            'title' => $title,
            'content' => $content,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        $updateData = [
            'title' => $updateTitle,
            'content' => $updateContent,
        ];

        // Act：定義要執行的動作
        $articleObject = new Article();
        $articleObject->create($article); // 新增
        $getArticle = $articleObject->get(1); // 讀取
        $updateArticleResult = $articleObject->update(1, $updateData); // 修改

        // Assert：斷言執行的結果
        $this->assertEquals($title, $getArticle['title']);
        $this->assertEquals($content, $getArticle['content']);
        $this->assertEquals($updateTitle, $updateArticleResult['title']);
        $this->assertEquals($updateContent, $updateArticleResult['content']);
    }
}
