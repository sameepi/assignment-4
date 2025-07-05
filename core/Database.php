<?php
class Database {
    private $host = 'hfo7d.h.filess.io';
    private $port = '3305';
    private $dbname = 'user_teamsithay';
    private $user = 'user_teamsithay';
    private $pass = 'e22e39738d979ef82d9bad5fb17354d8f6fa0941'; 
    protected $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
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
        return new PDO(
            "mysql:host=hfo7d.h.filess.io;port=3305;dbname=user_teamsithay;charset=utf8mb4",
            "user_teamsithay",
            "e22e39738d979ef82d9bad5fb17354d8f6fa0941",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
