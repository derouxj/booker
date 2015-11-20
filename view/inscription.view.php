<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Inscription
        </title>
    </head>
    <body>
        <?php include('menu.view.php'); ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>
                    Identité
                </legend>
                <p>
                <div>Identifiant :</div><input type="text" name="id" autofocus>
                </p>
                <p>
                <div>Nom :</div><input type="text" name="nom">
                </p>
                <p>
                <div>Prenom :</div><input type="text" name="prenom">
                </p>
            </fieldset>
            <fieldset>
                <legend>
                    Autres infos
                </legend>
                <p><div>Email :</div><input type="email" name="email" placeholder="exemple@machin.fr">
                </p>
                <p><div>Lieu :</div><input type="text" name="lieu">
                </p>
                <p><div>Catégorie :</div>
                <SELECT name="cat" size="1">
                    <OPTION>Artiste
                    <OPTION>Autre
                    <OPTION>Booker
                </SELECT>
                </p>
                <p><div>Mot de passe :</div><input type="password" name="password">
                </p>
                <p><div>Confirmation mot de passe :</div><input type="password" name="passwordconf">
                </p>
                <p><div>Description :</div><textarea name="desc" rows=3></textarea>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Valider">
        </form>
    </body>
</html>
