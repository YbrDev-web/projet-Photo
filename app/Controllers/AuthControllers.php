<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function register() {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = trim($_POST["email"]);
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalide";
            }
            if (strlen($username) < 3) {
                $errors[] = "Nom d'utilisateur trop court";
            }
            if (strlen($password) < 6) {
                $errors[] = "Mot de passe trop court";
            }

            if (empty($errors)) {
                $userModel = new User();
                if ($userModel->findByEmail($email)) {
                    $errors[] = "Cet email est déjà utilisé.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $userModel->create($email, $username, $hashedPassword);
                    header("Location: /?url=auth/login");
                    exit;
                }
            }
        }

        require_once __DIR__ . '/../views/auth/register.php';
    }
}
