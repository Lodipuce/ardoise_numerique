<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
        <title>Ardoise Numérique, admin </title>
    </head>

    <body>
        <nav class="navbar">
            <a href="index.php">acceuil</a>
            <a>|</a>
            <a href="php/logout.php">se déconnecter</a>
        </nav>

        <h1 class="title">BACK OFFICE</h1>

        <?php
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo ('Bonjour admin');
        }
        else {
            die ("Vous n'êtes pas autorisé à accéder à cette page");
        }
        ?>

        <h2><a href="creerArdoise.php">Créer une ardoise</a></h2>


        <h2>Modifier une ardoise</h2>
        <?php include('php/functions.php');
        showArdoisesToModify(); ?>


        <h2>Supprimer une ardoise</h2>
        <?php showArdoisesToDelete(); ?>
        

        <h2><a href="modifierPassword.php">Modifier mon mot de passe</a></h2>


        <script src="js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>