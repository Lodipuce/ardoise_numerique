<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

if (!empty($errors)) { ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $error ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="fr">

        <h1 class="title">MODIFIER MON MOT DE PASSE</h1>

        <form action="?controller=admin&action=modifierPassword" method="post">

        <label for="oldPwd">Ancien mot de passe</label><br/>
        <input type="password" name="oldPwd" id="oldPwd" required><br/>

        <label for="newPwd">Nouveau mot de passe</label><br/>
        <input type="password" name="newPwd" id="newPwd" required><br/>

        <label for="confirmNewPwd">Confirmation du nouveau mot de passe</label><br/>
        <input type="password" name="confirmNewPwd" id="confirmNewPwd" required><br/>

        <input type="submit" value="Valider">

        </form>


        <script src="js/main.js"></script>
</html>