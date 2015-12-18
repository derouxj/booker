<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Contact
        </title>
    </head>
    <body>
        <?php include('menu.view.php'); ?>
        <section id="main">
            <center><p> AJOUT D'UN CONTACT AU CARNET </p>
                
                <form action="<?php if (isset($_GET['idC'])) echo $_SERVER['PHP_SELF']."?idC=".$_GET['idC']; else echo $_SERVER['PHP_SELF'];?>" method="POST">
            <?php if (isset($_COOKIE['username'])) { ?>
            <fieldset>
                <legend>
                    Créer/modifier un contact
                </legend>
                <-- A METTRE 
                <?php if (isset($_GET['idC'])) {
                    $info=$_GET['idC'];
                    $infoDuContact=$dao->getContactCarnet($info)[0];
                } else {
                    $infoDuContact= array("newCle","leProp","","","","","","","");
                } ?>
                <ul><li class="main">Nom :</li><li class="sec"><input type="text" name="lastname" value="<?php echo $infoDuContact[3]; ?>" autofocus></li></ul>
                <ul><li class="main">Prénom :</li><li class="sec"><input type="text" name="firstname" value="<?php echo $infoDuContact[2]; ?>"></li></ul>
                <ul><li class="main">Email :</li><li class="sec"><input type="email" name="email" value="<?php echo $infoDuContact[4]; ?>"></li></ul>
                <ul><li class="main">Ville :</li><li class="sec"><input type="text" name="place" value="<?php echo $infoDuContact[5]; ?>"></li></ul>
                <ul><li class="main">Metier :</li><li class="sec"><input type="text" name="job" value="<?php echo $infoDuContact[6]; ?>"></li></ul>
                <ul><li class="main">Téléphone :</li><li class="sec"><input type="text" name="phone" value="<?php echo $infoDuContact[7]; ?>"></li></ul>
                <ul class=area><li class="main">Détails :</li><li class="sec"><textarea name="others" rows="3" value="<?php echo $infoDuContact[8]; ?>"></textarea></li></ul>

            </fieldset>
            <input id="valider" type="submit" name="valider" value="Ajouter">
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