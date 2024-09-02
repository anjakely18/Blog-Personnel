<?php

class Database
{
    private $host = "localhost";
    private $db = "mini_blog";
    private $user = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new pdo("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "erreur de connexion:" . $e->getMessage();
        }

        return $this->conn;
    }
}
