<?php

include_once("../model/Event.php");
include_once("../model/DAO.class.php");


$event = $dao->getEventFromId($_GET['id']);

if($event) {
    $_POST['event'] = $event[0];
    $_POST['org'] = $dao->getAllFromUserName($_POST['event']->getUsernameOrg())[0];
    $_POST['artistes'] = $dao->getUsersFromEventId($_GET['id']);
    if (isset($_POST['submit'])) {
        if ($_POST['action'] == 0) {
            $dao->updateEventState($_POST['event']->getId(), 0);
        }
    } else {
        $dao->updateEventState($_POST['event']->getId(), 1);
    }
}

include("../view/unevent.view.php");
?>