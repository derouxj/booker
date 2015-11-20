<?php

include("../view/inscription.view.php");

if (isset($_POST['valider'])) {
//ajout d'un objet utilisateur à la BDD
    $correct = 1;
    if (isset($_POST['valider'])) {
        if (isset($_POST['id']) && $_POST['id'] != '') { //verif non existe BDD
            $id = $_POST['id'];
        } else {
//notifier qu'il faut remplir le champ/qu'il n'existe pas deja
            $correct = 0;
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $email = $_POST['email'];
        } else {
//notifier qu'il faut remplir le champ
            $correct = 0;
        }
        $lieu = $_POST['lieu'];
        $type = $_POST['type'];
        if (isset($_POST['password']) && $_POST['password'] != '') {
            if (isset($_POST['passwordconf']) && $_POST['passwordconf'] != '' &&
                    $_POST['passwordconf'] == $_POST['password']) {
                $password = $_POST['password'];
            } else {
//notifier qu'il faut remplir le champ/que le passconf!=pass
                $correct = 0;
            }
        } else {
//notifier qu'il faut remplir le champ
            $correct = 0;
        }
        $desc = $_POST['desc'];
        
        if($correct) {
//on cree notre obj user et on l'add a la bdd
        }
    }
}
?>
