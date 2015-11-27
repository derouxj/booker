<?php

include_once("../model/DAO.class.php");

if (isset($_COOKIE['username'])) {
  $data['user'] = $dao->getAllFromUserName($_COOKIE['username']);
}
if (isset($_POST['valider'])) {
    $dao->updateUser($_COOKIE['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['place'],$_POST['infos'],$_POST['pic']);
}

include("../view/changeacc.view.php");

?>