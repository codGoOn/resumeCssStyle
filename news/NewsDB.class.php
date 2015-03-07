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
        try{
        $datetime = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime)"
                . "VALUES(:title, :category, :description, :source, :datetime)";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':source', $source);
        $stmt->bindValue(':datetime', $datetime);
        $result = $stmt->execute();
        if(!is_object($result)){
            throw new Exception($this->_db->lastErrorMsg());
        }
        $stmt->close();
        return TRUE;
        }  catch (Exception $exc){
           $exc->getMessage(); 
        }
    }
    protected function fetch2Array($data){
        $arr = array();
        while ($row = $data->fetchArray(SQLITE3_ASSOC)){
            $arr[] = $row;
        }
        return $arr;
    }

    public function getNews() {
        try{
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime "
                . "FROM msgs, category "
                . "WHERE category.id = msgs.category "
                . "ORDER BY msgs.id DESC;";
        //$result = $this->_db->querySingle($sql, TRUE);
        $result = $this->_db->query($sql) or die($this->_db->lastErrorMsg());
        if(!is_object($result))
            throw new Exception($this->_db->lastErrorMsg());
        return $this->fetch2Array($result);
        }  catch (Exception $exc)
        {
            $exc->getMessage();
        }

    }
    public function deleteNews($id) {
        try{
        $sql = "DELETE FROM msgs WHERE id = $id";
        $res = $this->_db->exec($sql);
        if(!$res)
            throw new Exception($this->_db->lastErrorMsg());
        return TRUE;
        }  catch (Exception $exc){
           $exc->getMessage(); 
        }
    }
    public function clearStr($data){
        $data = trim(strip_tags($data));
        return $this->_db->escapeString($data);
    }
    public function clearInt($data){
        return abs((int)$data);
    }
}
