<?php

include_once("../model/Event.php");
include_once("../model/DAO.class.php");


$event = $dao->getEventFromId($_GET['idevent']);

if($event) {
    $_POST['event'] = $event[0];
    $_POST['org'] = $dao->getAllFromUserName($_POST['event']->getUsernameOrg())[0];
    $_POST['artistes'] = $dao->getUsersFromEventId($_GET['idevent']);
}

include("../view/infoevent.view.php");

?>