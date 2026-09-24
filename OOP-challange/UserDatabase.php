<?php

require_once 'User.php';

class UserDatabase {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=login_system;charset=utf8",
            "root",
            ""
        );

        $this->pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function addUser(User $user): bool {

        $stmt = $this->pdo->prepare("
            INSERT INTO users (username, passwordHash)
            VALUES (:username, :passwordHash)
        ");

        return $stmt->execute([
            ':username' => $user->getUsername(),
            ':passwordHash' => $user->getPasswordHash()
        ]);
    }

    public function findUserByUsername(string $username) {

        $stmt = $this->pdo->prepare("
            SELECT * FROM users
            WHERE username = :username
            LIMIT 1
        ");

        $stmt->execute([
            ':username' => $username
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}