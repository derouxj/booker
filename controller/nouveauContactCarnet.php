<?php

include_once("../model/DAO.class.php");

if (isset($_COOKIE['username'])) {
  $data['user'] = $dao->getAllFromUserName($_COOKIE['username']);
}
if (isset($_POST['valider'])) {
    if (isset($_GET['idC'])) {
        $dao->updateCarnet($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['place'],$_POST['job'],$_POST['phone'],$_POST['others'],$_GET['idC']);
        header('Location: ../controller/carnet.php');
    } else {
        $dao->insertCarnet($_COOKIE['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['place'],$_POST['job'],$_POST['phone'],$_POST['others']);
        header('Location: ../controller/carnet.php');
    }
    
}

include("../view/nouveauContactCarnet.view.php");

?>