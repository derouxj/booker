<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();

$artistes = $dao->getUsersFromUserType('a');
if(!empty($artistes)){
    $data['artistes'] = $artistes;
}

include("../view/artistes.view.php");
?>
