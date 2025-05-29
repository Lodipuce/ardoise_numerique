<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include ('bddAccess.php');

$query = $db->prepare('DELETE FROM ardoise WHERE id_ardoise = :id_ardoise');
$query->execute([
    'id_ardoise' => $_GET['id_ardoise'],
]);

header('Location: ../admin.php');

?>