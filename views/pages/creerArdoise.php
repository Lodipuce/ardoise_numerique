<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="fr">
    <h1 class="title">CREER UNE ARDOISE</h1>

    <form action="?controller=pages&action=creerArdoise" method="post">
        <label for="prenom">Prénom (*)</label>
        <br />
        <input type="text" id="prenom" name="prenom">
        <br />
        <label for="montant">Montant (*)</label>
        <br />
        <input type="text" id="montant" name="montant">
        <br />
        <input type="submit" value="Valider">
    </form>
</html>