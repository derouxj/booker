<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Importer des contacts
        </title>
    </head>
    <body>
        <?php var_dump($users);?>
        <?php $active="carnet";include('menu.view.php'); ?>
        <section id="main">
            <center><p> IMPORTER UN CONTACT </p>
                
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <?php if (isset($_COOKIE['username'])) { ?>
            <fieldset>

                <p><ul class="listemult"><li class="main">Contact : </li><li class="sec">
                        <SELECT name="artists[]" size="4" multiple>
                        <?php
                            foreach($users as $a){
                                echo '<OPTION value="'.$a[0].'">'.$a[0];
                            }
                            ?> 
                        </SELECT></li></ul>
                </p>
            </fieldset>
            <input id="valider" type="submit" name="valider" value="Importer">
            <?php if (isset($_POST['valider'])) { 
                echo '<center><p>Contact ajouté</p></center>';
                }
            ?>
            <?php } else {
            echo '<center><p>Vous devez être connecté pour acceder à cette page</p></center>';
            } ?>
        </form>
            </center>
        </section>
</body>
</html>