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
            <?php if (isset($_COOKIE['username'])) { ?>
            
            <?php } ?>
            <div id="desc">Description de l'activité du site (WIP)</div>   
            <div id="contact">
                <a href='../controller/contact.php'>Nous contacter</a>
            </div>
        </section>
    </body>
</html>

