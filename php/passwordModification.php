<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('bddAccess.php');

$id_user = $_SESSION['id_user'];
$bddPassword = $_SESSION['password'];

$oldPwd = strip_tags($_POST['oldPwd']);
$newPwd = strip_tags($_POST['newPwd']);
$confirmNewPwd = strip_tags($_POST['confirmNewPwd']);

$checkPassword = password_verify($oldPwd, $bddPassword);

$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{10,}$/";

if ((isset($_POST['oldPwd']) && !empty($_POST['oldPwd'])) && (isset($_POST['newPwd']) && !empty($_POST['newPwd'])) && (isset($_POST['confirmNewPwd']) && !empty($_POST['confirmNewPwd']))) {
    if ($checkPassword === false) {
        die("Le mot de passe renseigné n'est pas le bon.");
    } elseif ($newPwd != $confirmNewPwd) {
        die ('Le nouveau mot de passe et sa confirmation doivent être identiques.');
    } elseif (!preg_match($regex, $newPwd)) {
        die ('Le mot de passe doit contenir au minimum 10 caractères dont 1 majuscule, 1 minuscule et 1 chiffre.');
    } 

    $password = password_hash($newPwd, PASSWORD_DEFAULT);

    $query = $db->prepare('UPDATE admin SET password = :password WHERE id_user = :id_user');
    $query->execute([
        'id_user' => $id_user,
        'password' => $password,
    ]);

    }


header('Location: ../admin.php');

?>