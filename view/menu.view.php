<style type="text/css">

    .menu nav ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
        //overflow: hidden;
        text-align : center;
    }


    .menu nav ul li{
        display: inline-block;
        text-align: center;
        width: 20%;
        border: solid black 1px;
        border-left : 0px;
    }

    .menu a {
        display: block;
        background-image:linear-gradient(white, LightBlue);
        text-decoration:none;
    }

    .menu a:visited {
        color : purple;
    }

    .menu a:hover {
        background-image:linear-gradient(LightBlue, blue);
        color : white;
    }

    .menu nav ul li:first-child {
        border-left: solid black 2px;
        border-top-left-radius : 5px;
        border-bottom-left-radius : 5px;
    }

    .menu nav ul li:last-child {
        border-right: solid black 2px;
        border-top-right-radius : 5px;
        border-bottom-right-radius : 5px;
    }

    .menu {
        margin-top: 3%;
        margin-bottom: 3%;
    }

    .menu > ul {
        margin-bottom : 3%;
        text-align : right;
        margin-right : 1em;
    }

    .menu > ul > li {
        margin-right:1px;
        margin-left:1px;
        display: inline-block;
        text-align: center;
        width: 10%;
        border: solid black 1px;
        border-collapse : collapse;
        border-radius : 3px;
    }

</style>

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
                    Acceuil
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