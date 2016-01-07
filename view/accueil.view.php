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
                    <a href="../controller/infoevent.php?idevent=<?php echo $value->getId(); ?>">
                        <section id="event">

                            <p class='name'>
                                <?php echo $value->getEventName(); ?>
                            </p>
                            <p>
                                Où : <?php echo $value->getEventPlace(); ?>
                            </p>
                            <p>
                                Quand : <?php echo $value->getEventDate(); ?>
                            </p>

                        </section>
                    </a>
                    <?php
                }
                } ?>
            
            <div id="end">
                <a href='../controller/contact.php'>
                    Contacter un administrateur
                </a>
            </div>
                
        </section>
    </body>
</html>

