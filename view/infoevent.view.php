<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleart.css" />
<html>
    <head>
        <title>
            Evenement
        </title>
    </head>
    <body>
        <?php
        $active = "accueil";
        include('menu.view.php');
        if (isset($_POST['event'])) { ?>
        <section id="art">
            <p>
                Organisateur : </br>
            <?php
            echo $_POST['org']->getLastname() . ' ';
            echo $_POST['org']->getFirstName(); ?>
            </p>
            <p>
                Nom de l'événement : 
            <?php echo $_POST['event']->getEventName(); ?>
            </p>
            <p>
                Artistes participant :
                </br>
                <?php foreach ($_POST['artistes'] as $value) { ?>
                    <a href="../controller/unartiste.php?art=<?php echo $value->getUserName(); ?>">
                        <?php echo $value->getLastname() . ' ' . $value->getFirstname(); ?>
                    </a>
                </br>
                <?php } ?>
            </p>
            <p>
                Lieu de l'événement : 
            <?php echo $_POST['event']->getEventPlace(); ?>
            </p>
            <p>
                Date de l'événement : 
            <?php echo $_POST['event']->getEventDate(); ?>
            </p>
            <p>
                Infos sur événement : 
            <?php echo $_POST['event']->getInfos(); ?>
            </p>
        </section>
        <?php
        } else {
            echo "<center><p>Cet événement n'existe pas</p></center>";
        }
 ?>
</body>
</html>