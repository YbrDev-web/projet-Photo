<?php

class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            $host = "db";       // nom du service docker-compose
            $dbname = "photos";
            $username = "user";
            $password = "password";

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

