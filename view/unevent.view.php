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
            echo $_POST['lel']->getLastname() . ' ';
            echo $_POST['lel']->getFirstName(); ?>
            </p>
            <p>
                Nom de l'événement : 
            <?php echo $_POST['event']->getEventName(); ?>
            </p>
            <p>
                Artistes participant :
                </br>
                <?php foreach ($_POST['artistes'] as $value) { ?>
                    <?php echo $value->getLastname() . ' ' . $value->getFirstname(); ?>
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
            <?php if($_POST['event']->isReady()) { ?>
            <p>
                Prêt ? Oui
            </p>
            <?php } else { ?>
            <p>
                Prêt ? Non
            </p>
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