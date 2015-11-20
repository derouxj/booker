<?php
require_once("DAO.class.php");
unset($_SESSION('username'));
header('Location: controller/accueil.php');

?>