<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$artistes = $dao->getUsersFromUserType('a');
if(!empty($artistes)){
    $data['artistes'] = $artistes;
}

include("../view/artistes.view.php");
?>
