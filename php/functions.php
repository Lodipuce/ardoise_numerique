<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Page d'acceuil
function showArdoises() {
    include ('bddAccess.php');
    $query = $db->prepare('SELECT * FROM ardoise');
    $query->execute();
    $ardoises = $query->fetchAll();

    foreach ($ardoises as $ardoise) {
        echo ('<span class="name_color">'.$ardoise['prenom'].'</span> <span class="sum_color">'.$ardoise['montant'].' €</span><br/>');
    }
}


// Page Admin
    // Modifier une ardoise
        // Montrer la liste des ardoises avec lien vers la page de modification
        function showArdoisesToModify() {
            include ('bddAccess.php');
            $query = $db->prepare('SELECT * FROM ardoise');
            $query->execute();
            $ardoises = $query->fetchAll();

            foreach ($ardoises as $ardoise) {
                echo ('<a href="modifierArdoise.php?id_ardoise='.$ardoise['id_ardoise'].'"><span> &rarr; </span> <span> '.$ardoise['prenom'].' </span></a><br>');
            }
        }

        // Afficher les informations sur la page de modification
        function showFirstName() {
            include ('bddAccess.php');
            $query = $db->prepare('SELECT * FROM ardoise WHERE id_ardoise = :id_ardoise');
            $query->execute([
                'id_ardoise' => $_GET['id_ardoise'],
            ]);
            $ardoise = $query->fetch();

            $upperFName = strtoupper($ardoise['prenom']);
            echo (''.$upperFName.'');
            
        }

        function showAmout() {
            include ('bddAccess.php');
            $query = $db->prepare('SELECT * FROM ardoise WHERE id_ardoise = :id_ardoise');
            $query->execute([
                'id_ardoise' => $_GET['id_ardoise'],
            ]);
            $ardoise = $query->fetch();

            echo (''.$ardoise['montant'].'');
        }



    // Supprimer une ardoise
        // Montrer la liste des ardoises avec lien vers le fichier php de suppression
        function showArdoisesToDelete() {
            include ('bddAccess.php');
            $query = $db->prepare('SELECT * FROM ardoise');
            $query->execute();
            $ardoises = $query->fetchAll();

            foreach ($ardoises as $ardoise) {
                echo ('<a href="php/ardoiseDeletion.php?id_ardoise='.$ardoise['id_ardoise'].'"><span> &rarr; </span> <span class="ardoises"><span> '.$ardoise['prenom'].' </span><span style= "display:none"> '.$ardoise['id_ardoise'].' </span></span></a><br>');
            } 
        }

        

    















?>