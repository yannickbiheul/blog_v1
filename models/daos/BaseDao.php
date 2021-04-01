<?php

class BaseDao {

    protected $_host = "localhost";
    protected $_dbname = "blog_v1";
    protected $_user = "root";
    protected $_password = "";

    public function dbConnect() {
        try {
            $db = new PDO("mysql:host=$this->_host; dbname=$this->_dbname", $this->_user, $this->_password);
            $db->exec('SET CHARACTER SET utf8');
            return $db;
        } catch(PDOException $e) {
            echo 'Problème de connexion : ' . $e->getMessage();
        }
    }

}
