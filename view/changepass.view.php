<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Changer mot de passe
        </title>
    </head>
    <body>
        <?php include('menu.view.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php if (isset($_COOKIE['username'])) { ?>
            <fieldset>
                <legend>
                    Modifier mes informations
                </legend>

                <ul><li class="main">Ancien mot de passe :</li><li class="sec"><input type="password" name="oldpass"></li></ul>
                <?php if(isset($_POST['nouserfound'])) {echo '<ul><li>Mot de passe incorrect<center></li></ul>';} ?>
                
                <ul><li class="main">Nouveau mot de passe :</li><li class="sec"><input type="password" name="newpass"></li></ul>
                
                <ul><li class="main">Confirmation nouveau mot de passe :</li><li class="sec"><input type="password" name="confnewpass"></li></ul>

                </fieldset>
                <input id="valider" type="submit" name="valider" value="Changer mot de passe">
                <?php
                if (isset($_POST['valider'])) {
                    if(isset($_POST['fieldnotset'])){echo '<script>alert("Le(s) champ(s) suivants sont incorrects : '.$_POST['fieldnotset'].'")</script>';}
                    else {
                        echo '<center><p>Mot de passe changé</p></center>';
                    }
                }
                ?>
            <?php } else {
            echo '<center><p>Vous devez être connecté pour acceder à cette page</p></center>';
            } ?>
        </form>
    </body>
</html>
