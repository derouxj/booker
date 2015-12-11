<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Connexion
        </title>
    </head>
    <body>
        <?php include('menu.view.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php if (!isset($_COOKIE['username'])) { ?>
            <fieldset>
                <legend>
                    Connexion
                </legend>
                <p>
                <ul><li class="main">Identifiant :</li><li class="sec"><input type="text" name="username" autofocus></li>
                </ul>
                </p>
                <p>
                <ul><li class="main">Mot de passe :</li><li class="sec"><input type="password" name="pass"></li></ul>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Se connecter">
            <?php } if(isset($_POST['fieldnotset'])){echo '<script>alert("Veuillez remplir le(s) champ(s) suivants : '.$_POST['fieldnotset'].'")</script>';}?>
        </form>
    </body>
</html>
