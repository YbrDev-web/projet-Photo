<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Créer un compte</h1>

    <?php if (!empty($_SESSION['errors'])): ?>
        <ul style="color: red;">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; unset($_SESSION['errors']); ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="/auth/registerPost">
        <label>Email :</label>
        <input type="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>" required><br>

        <label>Pseudo :</label>
        <input type="text" name="username" value="<?= $_SESSION['old']['username'] ?? '' ?>" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>

        <label>Confirmer le mot de passe :</label>
        <input type="password" name="confirm" required><br>

        <button type="submit">S’inscrire</button>
    </form>
</body>
</html>
<?php unset($_SESSION['old']); ?>
