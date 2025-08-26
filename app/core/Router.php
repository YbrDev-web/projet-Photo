<?php

class Router {
    public function handleRequest(string $url) {
        session_start();

        switch ($url) {
            case '':
                require_once __DIR__ . '/../controllers/HomeControllers.php';
                $controller = new HomeController();
                $controller->index();
                break;

            case 'auth/register':
                require_once __DIR__ . '/../controllers/AuthControllers.php';
                $controller = new AuthController();
                $controller->registerForm();
                break;

            case 'auth/registerPost':
                require_once __DIR__ . '/../controllers/AuthControllers.php';
                $controller = new AuthController();
                $controller->register();
                break;

            default:
                echo "404 - Page introuvable";
        }
    }
}
