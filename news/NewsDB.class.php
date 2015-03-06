<?php
require 'InewsDB.class.php';

class NewsDB implements INewsDB{
    protected $_db;
    const DB_NAME = 'C:\xampp\htdocs\www\mysite.local\news.db';
    
    public function __construct() {
        if(is_file(self::DB_NAME)){
            $this->_db = new SQLite3(self::DB_NAME);
        }else{
            $this->_db = new SQLite3(self::DB_NAME);
            $sql = 'CREATE TABLE msgs(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        title TEXT,
                        category INTEGER,
                        description TEXT,
                        source TEXT,
                        datetime INTEGER
                )';
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = 'CREATE TABLE category(
                        id INTEGER,
                        name TEXT
                )';
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "INSERT INTO category(id, name)
                        SELECT 1 as id, 'Политика' as name
                        UNION SELECT 2 as id, 'Культура' as name
                        UNION SELECT 3 as id, 'Спорт' as name";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
        }
    }
    public function __destruct() {
        unset($this->_db);
    }
    public function saveNews($title, $category, $description, $source) {
        ;
    }
    public function getNews() {
        ;
    }
    public function deleteNews($id) {
        ;
    }
}
$news = new NewsDB; 