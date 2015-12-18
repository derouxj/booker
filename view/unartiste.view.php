<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleart.css" />
<html>
    <head>
        <title>
            <?php echo $_GET['art']; ?>
        </title>
    </head>
    <body>
        <?php
        $active = "artistes";
        include('menu.view.php');
        if ($artiste) { ?>
        <section id="art">
            <img src='<?php echo $artiste->getProfilPic(); ?>' height="200" width="200">
            <p>
            <?php echo $artiste->getLastname(); ?>
            <?php echo $artiste->getFirstName(); ?>
            <p>
                Email : 
            <?php echo $artiste->getEmail(); ?>
            </p>
            <p>
                Place : 
            <?php echo $artiste->getPlace(); ?>
            </p>
            <p>
                Infos : 
            <?php echo $artiste->getInfos(); ?>
            </p>
            <p>
                Vidéo :
                <iframe width="420" height="315" src='<?php echo $artiste2->getVideo(); ?>'></iframe> 
                //https://www.youtube.com/embed/gEPmA3USJdI
            </p>
            <p>
                A savoir:
                <?php echo $artiste2->getAnecdote(); ?>
            </p>
        </section>
        <?php
        } else {
            echo "<center><p>Cet artiste n'existe pas</p></center>";
        }
 ?>
</body>
</html>