<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Modifier mes informations
        </title>
    </head>
    <body>
        <?php $active = "compte";include('menu.view.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php if (isset($_COOKIE['username'])) { ?>
            <fieldset>
                <legend>
                    Modifier mes informations
                </legend>

                <ul><li class="main">Nom :</li><li class="sec"><input type="text" name="lastname" value="<?php echo $data['user'][0]->getLastname(); ?>" autofocus></li></ul>

                <ul><li class="main">Prénom :</li><li class="sec"><input type="text" name="firstname" value="<?php echo $data['user'][0]->getFirstname(); ?>"></li></ul>

                <ul><li class="main">Email :</li><li class="sec"><input type="email" name="email" value="<?php echo $data['user'][0]->getEmail(); ?>"></li></ul>

                <ul><li class="main">Ville :</li><li class="sec"><input type="text" name="place" value="<?php echo $data['user'][0]->getPlace(); ?>"></li></ul>
                
                <ul class=area><li class="main">Description :</li><li class="sec"><textarea name="infos" rows="3"><?php echo $data['user'][0]->getInfos(); ?></textarea></li></ul>
                
                <ul><li class="main">Mot de passe :</li><li class="sec"><a href="../controller/changepass.php">Changer</a></li></ul>

                <ul><li class="main">URL image :</li><li class="sec"><input type="text" name="pic" value="<?php echo $data['user'][0]->getProfilPic(); ?>"></li></ul>

            </fieldset>
            <input id="valider" type="submit" name="valider" value="Sauvegarder modifications">
            <?php if (isset($_POST['valider'])) { 
                echo '<center><p>Modifications effectuées</p></center>';
                }
            ?>
            <?php } else {
            echo '<center><p>Vous devez être connecté pour acceder à cette page</p></center>';
            } ?>
        </form>
    </body>
</html>
