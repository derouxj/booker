<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();
if (isset($_POST['valider'])) {
    $correct = 1;
    $s = "";
    if ($_POST['username']!='' && !empty($dao->getAllFromUserName($_POST['username']))) {
        $username = $_POST['username'];
    } else {
        if($_POST['username']==''){
            $s .= '\n   - Identifiant';
            $_POST['fieldnotset'] = $s;
        }
        $correct = 0;
    }
    if ($_POST['pass'] != '') {
        $pass = $_POST['pass'];
    } else {
        $s .= '\n   - Mot de passe';
        $_POST['fieldnotset'] = $s;
        $correct = 0;
    }
    if ($correct) {
        if ($dao->rightPassword($username, $pass)) {
            setcookie("username", $username, time() + 3600);
            header('Location: ../controller/accueil.php');
            unset($_POST['nouserfound']);
        } 
    }else if($s==""){
        $_POST['nouserfound'] = 1;
    }
}
include("../view/connexion.view.php");
?>
