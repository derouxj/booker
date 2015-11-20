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
        <?php
        include("menu.view.php");
        //tous les attributs de mon compte depuis $data['user']?>
        <p>Identifiant : <?php echo $data['user']->getUsername(); ?></p>
        <p>Nom : <?php echo $data['user']->lastname(); ?></p>
        <p>Prenom : <?php echo $data['user']->getFirstName(); ?></p>
        <p>Email : <?php echo $data['user']->getEmail(); ?></p>
        <p>Lieu : <?php echo $data['user']->getPlace(); ?></p>
        <p>Infos : <?php echo $data['user']->getInfos(); ?></p>
        <p>Image profil : <img src='<?php echo $data['user']->getEmail(); ?>' alt='image' height="200" width="200"></p>
    </body>
</html>
