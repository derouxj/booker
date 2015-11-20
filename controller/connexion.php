<?php

include("../view/connexion.view.php");

$id;$pass;
if(isset($_POST['valider'])) {
    $correct=1;
    if(isset($_POST['id']) && $_POST['id'] != ''){
        $id=$_POST['id'];
    } else {
        //notifier qu'il faut remplir le champ
        $correct=0;
    }
    if(isset($_POST['pass']) && $_POST['pass'] != ''){
        $pass=$_POST['pass'];
    } else {
        //notifier qu'il faut remplir le champ
        $correct=0;
    }
    if($correct) {
        session_start();
        /*if(chercher si un user a cette combinaison){
            $_SESSION['login']=$id;
            $_SESSION['pass']=$pass;
            $_SESSION['co']=1;
        } else {
            //notifier user/mdp incorrect
        }*/
    }
}
?>
