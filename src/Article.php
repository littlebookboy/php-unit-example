<?php

namespace PHPUnit\Example;

use SQLite3;

class Article
{
    protected $db;
    protected $table;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->table = 'articles';
        $this->db = $this->sqliteOpen('../database/sqlite.db');
    }

    /**
     * @param array $article
     */
    public function create(array $article)
    {
        return $article;
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