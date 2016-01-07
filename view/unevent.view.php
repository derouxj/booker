<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleart.css" />
<html>
    <head>
        <title>
            Evenement
        </title>
    </head>
    <body>
        <?php
        $active = "compte";
        include('menu.view.php');
        if (isset($_COOKIE['username'])) {
        if (isset($_POST['event'])) { ?>
        <section id="art">
            <p>
                Organisateur : </br>
            <?php
            echo $_POST['org']->getLastname() . ' ';
            echo $_POST['org']->getFirstName();
            echo '</br>( ' . $_POST['org']->getEmail() . ' )'; ?>
            </p>
            <p>
                Nom de l'événement : 
            <?php echo $_POST['event']->getEventName(); ?>
            </p>
            <p>
                Artistes participant :
                </br>
                <?php foreach ($_POST['artistes'] as $value) { ?>
                    <a href="../controller/unartiste.php?art=<?php echo $value->getUserName(); ?>">
                        <?php echo $value->getLastname() . ' ' . $value->getFirstname(); 
                        echo '</br>( ' . $value->getEmail() . ' )';?>
                    </a>
                </br>
                <?php } ?>
            </p>
            <p>
                Lieu de l'événement : 
            <?php echo $_POST['event']->getEventPlace(); ?>
            </p>
            <p>
                Date de l'événement : 
            <?php echo $_POST['event']->getEventDate(); ?>
            </p>
            <p>
                Infos sur événement : 
            <?php echo $_POST['event']->getInfos(); ?>
            </p>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id']; ?>" method="POST">
            <?php
            if($_POST['event']->isReady() == 1) { ?>
            <p>
                <input type="radio" name="action" value="1" id="readiness" class="hidden-radio" />
                <label for="readiness"><input class="green_btn" type="submit" value="Pret ? Oui"/></label>
            </p>
            <?php } else { ?>
            <p>
                <input type="radio" name="action" value="0" id="readiness" class="hidden-radio" />
                <label for="readiness"><input class="red_btn" type="submit" value="Pret ? Non"/></label>
            </p>
            <?php } ?>
            </form>
            
        </section>
        <?php
        } else {
            echo "<center><p>Cet événement n'existe pas</p></center>";
        }
        } else {
            echo "<center><p>Vous devez être connecté pour accéder à cette page</p></center>";
        }
 ?>
</body>
</html>