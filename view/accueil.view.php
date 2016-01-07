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
        <?php $active = "accueil"; include("menu.view.php"); ?>
        <section id="main">
            <?php
                if (isset($data['contenu'])) {
                    foreach ($data['contenu'] as $value) {
                        ?>
                        <section>
                            <a href="../controller/infoevent.php?idevent=<?php echo $value->getId(); ?>">
                            <p class='name'>
                                <?php echo $value->getEventName(); ?>
                            </p>
                            </a>
                            <p>
                                Où : <?php echo $value->getEventPlace(); ?>
                            </p>
                            <p>
                                Quand : <?php echo $value->getEventDate(); ?>
                            </p>
                            <p>
                                Infos : <?php echo $value->getInfos(); ?>
                            </p>
                        </section>
                        <?php
                    }
                } ?>
            <div id="contact">
                <a href='../controller/contact.php'>
                    Nous contacter
                </a>
            </div>
        </section>
    </body>
</html>

