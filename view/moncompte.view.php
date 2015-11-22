<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleacc.css" />
<html>
    <head>
        <title>
            Mon compte
        </title>
    </head>
    <body>
        <?php if (!isset($_COOKIE['username'])) { ?>
            <?php
            include("menu.view.php");
            //tous les attributs de mon compte depuis $data['user']
            ?>
            <p>Identifiant : <?php echo $data['user'][0]->getUsername(); ?></p>
            <p>Nom : <?php echo $data['user'][0]->getLastname(); ?></p>
            <p>Prenom : <?php echo $data['user'][0]->getFirstName(); ?></p>
            <p>Email : <?php echo $data['user'][0]->getEmail(); ?></p>
            <p>Lieu : <?php echo $data['user'][0]->getPlace(); ?></p>
            <p>Infos : <?php echo $data['user'][0]->getInfos(); ?></p>
            <p>Image profil : <img src='<?php echo $data['user'][0]->getEmail(); ?>' alt='image' height="200" width="200"></p>
        <?php } else {
            echo '<p>Vous devez être connecté pour voir cette page</p>';
        } ?>
    </body>
</html>
