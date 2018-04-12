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
     * @param string $title
     */
    public function getByTitle(string $title)
    {
        $sql = '
            SELECT *
            FROM `' . $this->table . '` 
            WHERE `title` = \'' . $title . '\'
        ';
        $result = $this->db->query($sql);
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    /**
     * @param int $id
     * @param array $updateData
     * @return array
     */
    public function update(int $id, array $updateData)
    {
        $title = (!empty($updateData['title'])) ? '`title` = \'' . $updateData['title'] . '\' ' : '';
        $content = (!empty($updateData['content'])) ? '`content` = \'' . $updateData['content'] . '\' ' : '';
        $update = '';
        if ($title !== '' && $content !== '') {
            $update = $title . ',' . $content;
        }
        if ($title !== '' && $content === '') {
            $update = $title;
        }
        if ($title === '' && $content !== '') {
            $update = $content;
        }
        if ($title === '' && $content === '') {
            return $this->get($id);
        }
        $sql = '
            UPDATE `' . $this->table . '` 
            SET
                ' . $update . ' 
            WHERE `id` = ' . $id . ';
        ';
        $this->db->query($sql);
        return $this->get($id);
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