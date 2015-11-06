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
            <fieldset>
                <legend>
                    Connexion
                </legend>
                <p>
                <div>Identifiant :</div><input type="text" name="id" autofocus>
                </p>
                <p>
                <div>Mot de passe :</div><input type="password" name="pass">
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Se connecter">
        </form>
    </body>
</html>
