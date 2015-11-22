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
                <ul><li class="main">Identifiant :</li><li class="sec"><input type="text" name="id" autofocus></li></ul>
                </p>
                <p>
                <ul><li class="main">Nom :</li><li class="sec"><input type="text" name="nom"></li></ul>
                </p>
                <p>
                <ul><li class="main">Prenom :</li><li class="sec"><input type="text" name="prenom"></li></ul>
                </p>
            </fieldset>
            <fieldset>
                <legend>
                    Autres infos
                </legend>
                <ul><p><li class="main">E-mail :</li><li class="sec"><input type="email" name="email" placeholder="exemple@machin.fr"></li></ul>
                </p>
                <ul><p><li class="main">Ville :</li><li class="sec"><input type="text" name="ville"></li></ul>
                </p>
                <ul class="liste"><p><li class="main">Catégorie d'utilisateur :</li>
                    <li class="sec">
                        <SELECT name="type" size="1">
                            <OPTION value="a">Artiste
                            <OPTION value="b">Booker
                            <OPTION value="o">Autre
                        </SELECT>
                    </li></ul>
                </p>
                <p><ul><li class="main">Mot de passe :</li><li class="sec"><input type="password" name="password"></li></ul>
                </p>
                <p><ul><li class="main">Confirmation mot de passe :</li><li class="sec"><input type="password" name="passwordconf"></li></ul>
                </p>
                <p><ul class=area><li class="main">Description :</li><li class="sec"><textarea name="desc" rows="3"></textarea></li></ul>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Valider">
        </form>
    </body>
</html>