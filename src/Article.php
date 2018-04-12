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
        
        // phpstorm 產生的 sqlite 對應路徑
        if (file_exists('../database/sqlite.db')) {
            $this->db = $this->sqliteOpen('../database/sqlite.db');
        } else {
            // vscode 產生的 sqlite 對應路徑
            $this->db = $this->sqliteOpen('./database/sqlite.db');
        }
    }

    /**
     * Article constructor.
     */
    public function __destruct()
    {
        $this->db->close();
    }

    /**
     * @param array $article
     */
    public function create(array $article)
    {
        $sql = '
            INSERT INTO `' . $this->table . '` 
                (
                    title, 
                    content, 
                    created_at, 
                    updated_at
                )
            VALUES 
                (
                    \'' . $article['title'] . '\', 
                    \'' . $article['content'] . '\', 
                    \'' . $article['created_at'] . '\', 
                    \'' . $article['updated_at'] . '\'
                );
        ';
        $this->db->query($sql);
        $result = $this->db->query('SELECT last_insert_rowid() as last_insert_id;');
        return $result->fetchArray();
    }

    /**
     * @param int $id
     */
    public function get(int $id)
    {
        $sql = '
            SELECT *
            FROM `' . $this->table . '` 
            WHERE `id` = ' . $id . '
        ';
        $result = $this->db->query($sql);
        return $result->fetchArray(SQLITE3_ASSOC);
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