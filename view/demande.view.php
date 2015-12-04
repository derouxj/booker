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
                        <SELECT name="booker" size="1">
                            <?php
                            $i=1;
                            foreach($bookers as $b){
                                echo '<OPTION value="'.$i.'">'.$b->getUsername();
                                $i++;
                            }
                            ?> 
                        </SELECT></li></ul>
                </p>
                <p><ul class="listemult"><li class="main">Artistes demandés : </li><li class="sec">
                        <SELECT name="artist" size="4" multiple>
                        <?php
                            $i=1;
                            foreach($artists as $a){
                                echo '<OPTION value="'.$i.'">'.$a->getUsername();
                                $i++;
                            }
                            ?> 
                        </SELECT></li></ul>
                </p>
                <p><ul><li class="main">Nom de l'événement :</li><li class="sec"><input type="text" name="name"></li></ul>
                </p>
                <p><ul><li class="main">Lieu de déroulement de l'événement :</li><li class="sec"><input type="text" name="place"></li></ul>
                </p>
                <p><ul><li class="main">Date de l'événement :</li><li class="sec"><input type="text" name="date"></li></ul>
                </p>
                <p><ul class="area"><li class="main">Description de l'événement:</li><li class="sec"><textarea name="desc" rows=3></textarea></li></ul>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Valider">
            <?php if(isset($_POST['fieldnotset'])){echo '<script>alert("Veuillez remplir tout les champs d\'information.")</script>';}
            } else {
            echo '<center><p>Vous devez être connecté pour voir cette page</p></center>';
            } ?>
        </form>
    </body>
</html>
