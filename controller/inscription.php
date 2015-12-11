<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();

if (isset($_POST['valider'])) {
    $correct = 1;
    $s = "";
    if (isset($_POST['valider'])) {
        if (($_POST['id'])!='' && !$dao->getAllFromUserName($_POST['id'])) {
            $id = $_POST['id'];
        } else if($dao->getAllFromUserName($_POST['id'])){
            $correct=0;
            $_POST['alreadyused'] = 1;
        }
        else {
            $s .= '\n   - Identifiant';
            $correct = 0;
        }
        if($_POST['nom'] != ''){$nom = $_POST['nom'];}
        else{$s .= '\n   - Nom';}
        if($_POST['prenom'] != ''){$prenom = $_POST['prenom'];}
        else{$s .= '\n   - Prenom';}
        if ($_POST['email'] != '') {
            $email = $_POST['email'];
        } else {
            $s .= '\n   - Email';
            $correct = 0;
        }
        $lieu = $_POST['lieu'];
        $type = $_POST['type'];
        if ($_POST['password'] != '') {
            if ($_POST['passwordconf'] == $_POST['password']) {
                $password = $_POST['password'];
            } else {
                $s .= '\n   - Le mot de passe et sa confirmation doivent être identique';
                $correct = 0;
            }
        } else {
            $s .= '\n   - Mot de passe';
            $correct = 0;
        }
        $desc = $_POST['desc'];
        unset($_POST['fieldnotset']);
        if($s != "") {$_POST['fieldnotset'] = $s;}
        if ($correct) {
            $user = new Users($id, $dao->hashPassWord($password), $prenom, $nom, $email, $lieu, $type, $desc, 'Default');
            $dao->insertUser($user);
            unset($user);
            header('Location: ../controller/accueil.php');
        }
    }
}
include("../view/inscription.view.php");
?>
