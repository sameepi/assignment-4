<?php

class User {

    public function register($username, $password) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function login($email, $password) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function insert($data){
        $db = db_connect();
        $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
                VALUES (:first_name, :last_name, :email, :password, :created_at, :updated_at)";
        $stmt = $db->prepare($query);
        return $stmt->execute($data);
    }

    public function findByEmail($email) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($email, $password) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        return $stmt->execute([$email, $password]);
    }
    
}
