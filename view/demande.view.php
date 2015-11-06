<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Demande
        </title>
    </head>
    <body>
        <?php include('menu.view.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>
                    Coordonnées
                </legend>
                <p>
                <div>Nom :</div><input type="text" name="id" autofocus>
                </p>
                <p>
                <div>Numéro de téléphone :</div><input type="text" name="nom">
                </p>
                <p>
                <div>Email :</div><input type="text" name="email" placeholder="exemple@machin.fr">
                </p>
            </fieldset>
            <fieldset>
                <legend>
                    Autres infos
                </legend>
                <p><div>Artiste/booker dont j'ai besoin :</div><textarea name="who" rows=3></textarea>
                </p>
                <p><div>Informations événement :</div><textarea name="evt" rows=3></textarea>
                </p>
                <p><div>Description :</div><textarea name="desc" rows=3></textarea>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Valider">
        </form>
    </body>
</html>
