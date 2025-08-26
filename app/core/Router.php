<?php

class Router {
    public function handleRequest(string $url) {
        if ($url === '') {
            require_once __DIR__ . '/../Controllers/HomeControllers.php';
            $controller = new HomeController();
            $controller->index();
        } else {
            echo "Page demandée : " . htmlspecialchars($url);
        }
    }
}
