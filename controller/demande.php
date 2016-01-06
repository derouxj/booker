<?php

include_once("../model/DAO.class.php");
include_once("../model/Event.php");
$dao = new DAO();
$bookers = $dao->getUsersFromUserType('b');
$artists = $dao->getUsersFromUserType('a');
if (isset($_POST['valider'])) {

    if (($_POST['booker'] != '' && $_POST['eventName'] != '' && $_POST['place'] != '' && $_POST['desc'] != '') && (
            !(($_POST['month'] == 2 && ($_POST['day'] == 31 || $_POST['day'] == 30) &&
            (($_POST['month'] == 4 || $_POST['month'] == 6 || $_POST['month'] == 9 || $_POST['month'] == 11) && $_POST['day'] == 31))))) {
        $booker = $_POST['booker'];
        $artists = $_POST['artists'];
        $name = $_POST['eventName'];
        $place = $_POST['place'];
        $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        $descr = $_POST['desc'];
        $event = new Event(0, $booker, $_COOKIE['username'], $name, $place, $date, $descr);
        $dao->insertEvent($event, $artists);
        unset($event);
        header("Location: ../controller/accueil.php");
    } else {
        if (isset($_POST['fieldnotset'])) {
            unset($_POST['fieldnotset']);
        }
        $_POST['fieldnotset'] = 1;
    }
}


include("../view/demande.view.php");
?>
