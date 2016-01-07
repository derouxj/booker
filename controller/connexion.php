<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

if (isset($_POST['valider'])) {
    $s = "";
    $correct=1;
    if ($_POST['username']!='' && !empty($dao->getAllFromUserName($_POST['username']))) {
        $username = $_POST['username'];
    } else {
        if($_POST['username']==''){
            $s .= '\n   - Identifiant';
            $correct=0;
        }
    }
    if ($_POST['pass'] != '') {
        $pass = $_POST['pass'];
    } else {
        $s .= '\n   - Mot de passe';
        $correct = 0;
    }
    unset($_POST['fieldnotset']);
    if ($correct && isset($username)) {
        if ($dao->rightPassword($username, $pass)) {
            setcookie("username", $username, time() + 3600);
            header('Location: ../controller/accueil.php');
        }
    } else {
        $s .= '\n   - Identifiant ou mot de passe incorrect';
    }
    if ($s != "") {$_POST['fieldnotset'] = $s;}
}
include("../view/connexion.view.php");
?>
