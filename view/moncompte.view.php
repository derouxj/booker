<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/stylecompte.css" />
<html>
    <head>
        <title>
            Mon compte
        </title>
    </head>
    <body>
        <?php $active = "compte";include('menu.view.php'); ?>
        <section id="main">
            <?php if (isset($_COOKIE['username'])) { ?>
            <div>
            <p class="titles">Mes informations</p>
                <p>Identifiant : <?php echo $data['user'][0]->getUsername(); ?></p>
                <p>Nom : <?php echo $data['user'][0]->getLastname(); ?></p>
                <p>Prenom : <?php echo $data['user'][0]->getFirstName(); ?></p>
                <p>Email : <?php echo $data['user'][0]->getEmail(); ?></p>
                <p>Ville : <?php echo $data['user'][0]->getPlace(); ?></p>
                <p>Infos : <?php echo $data['user'][0]->getInfos(); ?></p>
                <p><img src='<?php echo $data['user'][0]->getProfilPic(); ?>' alt='image' height="200" width="200"></p>
                <a id="dem" href="../controller/changeacc.php">Modifier</a>
            </div>
            <div>
            <p class="titles">Mes événements</p>
                <p class="boxed">
                    <?php foreach($data['event'] as $e){
                        echo '<a href="../controller/unevent.php?id=' . $e->getId() . '">';
                        echo $e->getEventName().'<br>'; 
                        echo '</a>';
                        echo '</br>';
                    }?>
                </p>
            </div>
            <div>
            <p class="titles">Messagerie</p>    
                <?php
                foreach($data['msg'] as $m){
                        echo '<h3>'.$m->getTitle().'</h3><p> sent at </p><h3>'.$m->getDate().'</h3><p> by </p><h3>'.$m->getSender().'<h3><br>'; 
                    }?>                
            </div>
                
            <?php } else {
                echo '<center><p>Vous devez être connecté pour voir cette page</p></center>';
            } ?>
        </section>
    </body>
</html>