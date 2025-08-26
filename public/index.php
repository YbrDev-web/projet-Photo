<?php
// Point d'entrée unique (Front Controller)
require_once __DIR__ . '/../app/core/Router.php';

$router = new Router();
$router->handleRequest($_GET['url'] ?? '');
