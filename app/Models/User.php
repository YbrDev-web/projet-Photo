<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function findByEmail(string $email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $email, string $username, string $password) {
        $stmt = $this->db->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $username, $password]);
    }
}
