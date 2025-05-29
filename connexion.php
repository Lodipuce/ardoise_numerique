<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset ($_SESSION['admin']) && $_SESSION['admin']) {
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Ardoise Numérique, se connecter</title>
    </head>

    <body>
        <nav class="navbar">
            <a href="index.php">acceuil</a>
        </nav>

        <h1 class="title">SE CONNECTER</h1>

        <form action="php/login.php" method="post">
            <label for="login">Identifiant (*)</label>
            <br />
            <input type="text" id="login" name="login" required>
            <br />

            <label for="password">Mot de passe (*)</label>
            <br />
            <input type="text" id="password" name="password" required>
            <br />

            <input type="submit" value="Se connecter">
        </form>
    </body>
</html>