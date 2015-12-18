<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();

$artiste = $dao->getAllFromUserName($_GET['art'])[0];


include("../view/unartiste.view.php");

?>