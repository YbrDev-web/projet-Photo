<?php

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            $host = "db";      // service docker-compose
            $dbname = "photos";
            $user = "user";
            $pass = "password";

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion DB : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
