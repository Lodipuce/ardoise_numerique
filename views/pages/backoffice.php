<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

?>

<!DOCTYPE html>
<html lang="fr">

        <h1 class="title">BACK OFFICE</h1>

        <?php
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo ('Bonjour admin');
        }
        else {
            die ("Vous n'êtes pas autorisé à accéder à cette page");
        }

        if (isset($successMessage)) { ?>
            <div class="success">
                <?= $successMessage ?>
            </div>
        <?php } ?>

        <h2><a href="?controller=pages&action=formCreationArdoise">Créer une ardoise</a></h2>


        <h2>Modifier une ardoise</h2>
        <?php
            foreach ($ardoises as $ardoise) {
                echo ('<a href="?controller=pages&action=formModifArdoise&id_ardoise='.$ardoise->getId_ardoise().'">
                        <span> &rarr; </span> 
                        <span> '.$ardoise->getPrenom().' </span></a><br>');
            }
        ?>


        <h2>Supprimer une ardoise</h2>
        <?php
            foreach ($ardoises as $ardoise) {
                echo ('<a href="?controller=pages&action=supprimerArdoise&id_ardoise='.$ardoise->getId_ardoise().'">
                        <span> &rarr; </span> 
                        <span> '.$ardoise->getPrenom().' </span></a><br>');
            }
        ?>
        

        <h2><a href="?controller=pages&action=formModifPassword">Modifier mon mot de passe</a></h2>


        <script src="js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</html>