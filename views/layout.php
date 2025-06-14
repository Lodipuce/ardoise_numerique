<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Ardoise Numérique, acceuil</title>
    </head>
    <body>
        <nav class="navbar">
            <div class="navbar_div">
                <a href="?controller=pages&action=connection">se connecter / admin</a>
                <a>|</a>
                <a href="?controller=admin&action=logout">se déconnecter</a>
            </div>
        </nav>

        <?php require_once('./routes.php'); ?>
        
    </body>
</html>