<?php
       $accueil='';$artistes='';$compte='';$event='';$inscription='';$connexion='';
       if($active=="accueil"){$accueil="active";}
       if($active=="artistes"){$artistes="active";}
       if($active=="compte"){$compte="active";}
       if($active=="event"){$event="active";}
       if($active=="inscription"){$inscription="active";}
       if($active=="connexion"){$connexion="active";}

?>

<!doctype html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../view/style/stylesmenu.css" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <title>CSS MenuMaker</title>
    </head>
    <body>

        <div id='cssmenu'>
            <ul>
                <img src='http://www.dolfyn.net/dolfyn/icons/union-jack.png'height= 12 width = 17><li>
                    <a href='../controller/accueil.php'>English
                    </a>
                </li><li>
                    <a href='../controller/accueil.php'>Français

                    </a>
                </li><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/langfr-225px-Flag_of_France.svg.png'height= 12 width = 17>
            </ul>
            <ul>
                <li class='<?php echo $accueil?>'><a href="../index.php">Accueil</a></li>
                <li class='<?php echo $artistes?>'><a href="../controller/artistes.php">Artistes</a></li>
                <?php if (!isset($_COOKIE['username'])) { ?><li class='<?php echo $inscription?>'>
                        <a href="../controller/inscription.php">
                            Inscription
                        </a>
                    </li><li class='<?php echo $connexion?>'>
                        <a href="../controller/connexion.php">
                            Connexion
                        </a>
                    </li><?php } else { ?><li class='<?php echo $compte?>'>
                        <a href="../controller/moncompte.php">
                            Mon compte
                        </a>
                    </li><li class='<?php echo $event?>'>
                            <a href='../controller/demande.php'>
                                Organiser un événement
                            </a>
                        </li><li>
                        
                        <a href="../controller/deconnexion.php">
                            Deconnexion
                            </a>
                        </li>
                        
                    <?php } ?>



            </ul>
       
        </div>

    </body>
    <html>
