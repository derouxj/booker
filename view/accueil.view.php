<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleacc.css" />
<html>
    <head>
        <title>
            Page d'accueil
        </title>
    </head>
    <body>
        <?php include("menu.view.php"); ?>
        <section id="main">
            <?php if (!isset($_COOKIE['username'])) { ?>
            <div id="dem">
                <a href='../controller/demande.php'>
                    Demande de booking
                </a>
            </div>
            <?php } ?>
            <div id="desc">Description de l'activité du site</div>   
            <div id="contact">
                <a href='../controller/contact.php'>Nous contacter</a>
            </div>
        </section>
    </body>
</html>

