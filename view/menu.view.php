
<link rel="stylesheet" type="text/css" href="../view/style/stylemenu.css" />

<div class="menu">
    <ul>
        <img src='http://www.dolfyn.net/dolfyn/icons/union-jack.png'height= 12 width = 17><li>
            <a href='../controller/accueil.php'>English
            </a>
        </li><li>
            <a href='../controller/accueil.php'>Français

            </a>
        </li><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/langfr-225px-Flag_of_France.svg.png'height= 12 width = 17>
    </ul>
    <nav>
        <ul>
            <li>
                <a href="../index.php">
                    Accueil
                </a>
            </li><li>
                <a href="../controller/artistes.php">
                    Artistes
                </a>
            </li><?php if (!isset($_COOKIE['username'])) { ?><li>
                <a href="../controller/inscription.php">
                    Inscription
                </a>
            </li><li>
                <a href="../controller/connexion.php">
                    Connexion
                </a>
            </li><?php } else { ?><li>
                <a href="../controller/moncompte.php">
                    Mon compte
                </a>
            </li><li>
                <a href="../controller/deconnexion.php">
                    Deconnexion
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</div>