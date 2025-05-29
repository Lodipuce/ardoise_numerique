<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('bddAccess.php');

$prenom = strip_tags($_POST['prenom']);
$montant = strip_tags($_POST['montant']);

$query = $db->prepare('INSERT INTO ardoise (prenom,montant,id_user) VALUES (:prenom, :montant, :id_user)');
$query->execute([
    'prenom' => $prenom,
    'montant' => $montant,
    'id_user' => $_SESSION['id_user'],
]);


header('Location: ../admin.php');

?>