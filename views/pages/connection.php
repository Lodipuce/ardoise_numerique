<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset ($_SESSION['admin']) && $_SESSION['admin']) {
    header('Location: ?controller=pages&action=backoffice');
}

?>


<html>
    <h1 class="title">SE CONNECTER</h1>

    <form action="?controller=admin&action=login" method="post">
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
</html>