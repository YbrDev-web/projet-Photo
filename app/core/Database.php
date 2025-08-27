<?php

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            // On récupère d’abord les variables d’environnement (Docker)
            $host = getenv("DB_HOST") ?: "db";
            $dbname = getenv("DB_NAME") ?: "photos";
            $user = getenv("DB_USER") ?: "user";
            $pass = getenv("DB_PASS") ?: "password";

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
