<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    public function registerForm() {
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function register() {
        $errors = [];
        $email = trim($_POST['email'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalide";
        }
        if (strlen($username) < 3) {
            $errors[] = "Pseudo trop court (min. 3 caractères)";
        }
        if ($password !== $confirm) {
            $errors[] = "Les mots de passe ne correspondent pas";
        }
        if (strlen($password) < 6) {
            $errors[] = "Mot de passe trop court (min. 6 caractères)";
        }

        $userModel = new User();
        if ($userModel->findByEmail($email)) {
            $errors[] = "Email déjà utilisé";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: /auth/register");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userModel->create($email, $username, $hashedPassword);

        $_SESSION['success'] = "Inscription réussie ! Vous pouvez vous connecter.";
        header("Location: /auth/login");
        exit;
    }
}
