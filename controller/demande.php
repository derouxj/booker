<?php
include_once("../model/DAO.class.php");
include_once("../model/Event.php");
$dao = new DAO();
$bookers = $dao->getUsersFromUserType('b');
$artists = $dao->getUsersFromUserType('a');
if(isset($_POST['valider'])){
    
    if(isset($_POST['booker']) && isset($_POST['name']) && isset($_POST['place']) && isset($_POST['date']) && isset($_POST['desc'])){
        $booker = $_POST['booker'];
        $artists = $_POST['artists'];
        $name = $_POST['name'];
        $place = $_POST['place'];
        $date = $_POST['date'];
        $descr = $_POST['desc'];
        $event = new Event($booker, $name, $place, $date, $descr);
        $dao->insertEvent($event, $artists);
        unset($event);
        header("Location: ../controller/accueil.php");
    }
    else{
        if(isset($_POST['fieldnotset'])){
            unset($_POST['fieldnotset']);
        }
        $_POST['fieldnotset'] = 1;
    }
}


include("../view/demande.view.php");
?>
