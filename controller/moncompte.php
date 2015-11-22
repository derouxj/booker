<?php

include_once("../model/DAO.class.php");

$data['user'] = $dao->getAllFromUserName($_COOKIE['username']);

include("../view/moncompte.view.php");
?>

