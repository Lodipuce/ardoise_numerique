<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('bddAccess.php');

$newAmount = strip_tags($_POST['newSum']);

$query = $db->prepare('UPDATE ardoise SET montant = :newAmount WHERE id_ardoise = :id_ardoise');
$query->execute([
    'newAmount' => $newAmount,
    'id_ardoise' => $_POST['id_ardoise'],
]);

header('Location: ../admin.php');

?>