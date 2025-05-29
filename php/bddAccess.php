<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    $db = new PDO(
    'mysql:host=localhost;dbname=ardoise_numerique;charset=utf8',
    'root',
    ''
    );
}
catch(Exception $e) {
    exit('<strong>Erreur</strong>'.$e->getMessage());
}

?>