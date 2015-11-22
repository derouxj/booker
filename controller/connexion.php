<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();
if (isset($_POST['valider'])) {
    $correct = 1;
    if (isset($_POST['username']) && $_POST['username'] != '') {
        $username = $_POST['username'];
    } else {
        //notifier qu'il faut remplir le champ
        $correct = 0;
    }
    if (isset($_POST['pass']) && $_POST['pass'] != '') {
        $pass = $_POST['pass'];
    } else {
        //notifier qu'il faut remplir le champ
        $correct = 0;
    }
    if ($correct) {
        //session_start();
        if ($dao->rightPassword($username, $pass)) {
            //$_SESSION['login']=$username;
            setcookie("username", $username, time() + 3600);
            //var_dump( $_SESSION['login']);
        } else {
            //notifier user/mdp incorrect
        }
    }
}
include("../view/connexion.view.php");
?>
