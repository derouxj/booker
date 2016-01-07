<?php

include_once("../model/Event.php");
include_once("../model/DAO.class.php");


$event = $dao->getEventFromId($_GET['id']);

if($event) {
    $_POST['event'] = $event[0];
    $_POST['org'] = $dao->getAllFromUserName($_POST['event']->getUsernameOrg())[0];
    $_POST['artistes'] = $dao->getUsersFromEventId($_GET['id']);
    if (isset($_POST['ready'])) { 
       $dao->updateEventState($_POST['event']->getId(),0);
    }
    else if (isset($_POST['notready'])) {
       $dao->updateEventState($_POST['event']->getId(),1);
    }
}

include("../view/unevent.view.php");

?>