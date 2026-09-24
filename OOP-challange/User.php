<?php

class User {

    private $id;
    private $username;
    private $passwordHash;

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function verifyPassword($password): bool {
        return password_verify($password, $this->passwordHash);
    }
}