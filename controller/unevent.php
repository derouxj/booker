<?php

include_once("../model/Event.php");
include_once("../model/DAO.class.php");

$dao = new DAO();

$truc = $dao->getEventFromId($_GET['id']);

if($truc) {
    $_POST['event'] = $truc[0];
    $_POST['lel'] = $dao->getAllFromUserName($_POST['event']->getUsernameOrg())[0];
    $_POST['artistes'] = $dao->getUsersFromEventId($_GET['id']);

}

include("../view/unevent.view.php");

?>