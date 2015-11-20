<?php
include_once("../model/DAO.class.php");

$data['user'] = $dao->getAllFromUserName($_SESSION('login'));

include("../view/moncompte.view.php");

?>

