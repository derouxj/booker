<?php
include_once("../model/DAO.class.php");
include_once("../model/Event.php");
$users = $dao->getUsers();
if(isset($_POST['valider'])){
    $imports=$_POST['artists'];
    foreach ($imports as $im) {
        $aImp=$dao->getAllFromUserName($im)[0];
        $dao->insertCarnet($_COOKIE['username'],$aImp->getFirstName(),$aImp->getLastName(),$aImp->getEmail(),$aImp->getPlace(),"","",$aImp->getInfos());
    }
    header("Location: ../controller/carnet.php");
}

include("../view/importerContact.view.php");
?>