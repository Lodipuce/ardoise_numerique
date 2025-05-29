<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="fr">
    <?php 
    $ardoise = Ardoise::find($_GET['id_ardoise']); 
    ?>

    <h1 class="title">MODIFIER L' ARDOISE</h1>
    
    <h2 class="title">DE <?= $ardoise->getPrenom(); ?></h2>

    <p>Le montant actuel est de <?= $ardoise->getMontant(); ?>€</p>

    <form action="?controller=pages&action=modifierArdoise" method="post">

        <label for="newSum">Le nouveau montant est de :</label><br/>
        <input type="text" name="newSum" id="newSum"> €<br/>

        <input type="hidden" value="<?= $ardoise->getId_ardoise(); ?>" id="id_ardoise" name="id_ardoise">

        <input type="submit" value="Valider">

    </form>

    <script src="js/main.js"></script>

</html>