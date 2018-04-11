<?php

namespace PHPUnit\Example\Tests;

use PHPUnit\Framework\TestCase;
use SQLite3;

class BaseTestCase extends TestCase
{
    protected $db;
    protected $table;
    protected $faker;

    /**
     * 建構式
     */
    public function setUp()
    {
        parent::setUp();

        $this->table = 'articles';
        $this->db = $this->sqliteOpen('../database/sqlite.db');
        $this->faker = \Faker\Factory::create('zh_TW');

        $this->initDatabase();
    }

    /**
     * 解構式
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->db = $this->sqliteOpen('../database/sqlite.db');
        $this->db->exec('DROP TABLE if EXISTS `' . $this->table . '`');
        $this->db->close();
    }

    /**
     * database 初始化
     */
    protected function initDatabase()
    {
        $sql = [
            'CREATE TABLE if NOT EXISTS `' . $this->table . '`',
            '(',
            '   id          integer  PRIMARY KEY AUTOINCREMENT,',
            '   title       text     NOT NULL,',
            '   content     text     NOT NULL,',
            '   created_at  datetime,',
            '   updated_at  datetime',
            ')'
        ];

        $this->db->exec(join($sql, ' '));
        $this->db->close();
    }

    /**
     * sqlite_open
     * @param $location
     * @param $mode
     * @return SQLite3
     */
    protected function sqliteOpen($location)
    {
        $handle = new SQLite3($location);
        return $handle;
    }
}

