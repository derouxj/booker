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
            <?php if (isset($_COOKIE['username'])) { ?>
            <fieldset>
                <legend>
                    Informations sur l'événement
                </legend>

                <p><ul class="liste"><li class="main">Booker demandé : </li><li class="sec">
                        <SELECT name="book" size="1">
                            <OPTION value="a">Booker B.
                                <!-- si des bookers engregistrés : afficher une liste ici, en choisir un seul-->
                        </SELECT></li></ul>
                </p>
                <p><ul class="listemult"><li class="main">Artistes demandés : </li><li class="sec">
                        <SELECT name="art" size="4" multiple>
                            <OPTION value="a">Artiste A.
                                <!-- si des artistes engregistrés : afficher une liste ici-->
                        </SELECT></li></ul>
                </p>
                <p><ul><li class="main">Nom de l'événement :</li><li class="sec"><input type="text" name="name"></li></ul>
                </p>
                <p><ul><li class="main">Lieu de déroulement de l'événement :</li><li class="sec"><input type="text" name="place"></li></ul>
                </p>
                <p><ul><li class="main">Date de l'événement :</li><li class="sec"><input type="text" name="evt"></li></ul>
                </p>
                <p><ul class="area"><li class="main">Description de l'événement:</li><li class="sec"><textarea name="desc" rows=3></textarea></li></ul>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Valider">
            <?php } else {
            echo '<center><p>Vous devez être connecté pour voir cette page</p></center>';
            } ?>
        </form>
    </body>
</html>
