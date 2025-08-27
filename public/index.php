<?php
// Point d'entrée unique (Front Controller)

// Démarrer la session (important pour auth)
//session_start();

// Charger le router
require_once __DIR__ . '/../app/core/Router.php';

// Récupérer le paramètre "url" (redirigé par Nginx ou Apache)
$url = $_GET['url'] ?? '';

// Router
$router = new Router();
$router->handleRequest($url);

