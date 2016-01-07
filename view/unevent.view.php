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
                <a href="../controller/unartiste.php?art=<?php echo $_POST['org']->getUserName(); ?>">
            <?php
            echo $_POST['org']->getLastname() . ' ';
            echo $_POST['org']->getFirstName();
            echo '</br>( ' . $_POST['org']->getEmail() . ' )'; ?>
                </a>
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
                -----------
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
            
            <?php if(isset($_GET['modif']) && $_GET['modif']=='done') {
                echo '<p>Le statut de cet evenement a été changé</p>';
            } else { ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] . '&modif=done'; ?>" method="POST">
                <?php
                if($_POST['event']->getReady() == 1) { ?>
                    <p>
                        <input class="green_btn" type="submit" value="Evenement pret" name="action"/>
                    </p>
                <?php } else { ?>
                    <p>
                        <input class="red_btn" type="submit" value="Evenement non pret" name="action"/>
                    </p>
                <?php } ?>
                </form>
            <?php } ?>
            
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