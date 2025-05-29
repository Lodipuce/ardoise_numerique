<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Ardoise Numérique, admin </title>
</head>

<body>
    <nav class="navbar">
        <a href="index.php">acceuil</a>
        <a>|</a>
        <a href="php/logout.php">se déconnecter</a>
    </nav>

    <h1 class="title">MODIFIER L' ARDOISE</h1>
    
    <?php include('php/functions.php'); ?>
    <h2 class="title">DE <?php showFirstName();  ?></h2>

    <p>Le montant actuel est de <?php showAmout(); ?>€</p>

    <form action="php/ardoiseModification.php" method="post">

    <label for="newSum">Le nouveau montant est de :</label><br/>
    <input type="text" name="newSum" id="newSum"> €<br/>

    <input type="hidden" value="<?php echo ''.$_GET['id_ardoise'].''; ?>" id="id_ardoise" name="id_ardoise">

    <input type="submit" value="Valider">

    </form>

    <script src="js/main.js"></script>
</body>

</html>