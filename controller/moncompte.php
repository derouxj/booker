<?php

include_once("../model/DAO.class.php");

if (isset($_COOKIE['username'])) {
  $data['user'] = $dao->getAllFromUserName($_COOKIE['username']);
}

include("../view/moncompte.view.php");
?>

