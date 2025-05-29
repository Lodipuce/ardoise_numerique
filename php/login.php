<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ((!isset($_POST['login']) || !isset($_POST['password'])) && (empty($_POST['login']) || empty($_POST['password']))) {
    die('Il faut un identifiant et un mot de passe pour se connecter.');
}

$login = strip_tags($_POST['login']);
$password = strip_tags($_POST['password']);

include ('bddAccess.php');
$query = $db->prepare('SELECT * FROM admin WHERE login = :identifiant');
$query->execute([
    "identifiant" => $login,
]);
$users = $query->fetchAll();

foreach ($users as $user) {
    $checkPassword = password_verify($password, $user['password']);
    if ($login === $user['login'] && $checkPassword === true) {
        $_SESSION['id_user']= $user['id_user'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['admin'] = true;
        header('Location: ../admin.php');
    } 
    else {
        die('Error');
    }
}
















?>