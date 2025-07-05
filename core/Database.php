git push origin HEAD:<?php
class Database {
    private $host = 'hfo7d.h.filess.io';
    private $dbname = 'user_teamsithay';
    private $user = 'user_teamsithay';
    private $pass = 'e22e39738d979ef82d9bad5fb17354d8f6fa0941';
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

function db_connect() {
    try {
        return new PDO("mysql:host=localhost;dbname=assignment4", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
