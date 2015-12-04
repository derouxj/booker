<?php
include_once("../model/DAO.class.php");
include_once("../model/Event.php");
$dao = new DAO();

if(isset($_POST['Valider'])){
    
    if(isset($_POST['name']) && isset($_POST['place']) && isset($_POST['date']) && isset($_POST['descr'])){
        $booker = $_POST['booker'];
        $artist = $_POST['artist'];
        $name = $_POST['name'];
        $place = $_POST['place'];
        $date = $_POST['date'];
        $descr = $_POST['descr'];
    }
    else{
        $_POST['fieldnotset'] = 1;
    }
    
    
}


include("../view/demande.view.php");
?>
