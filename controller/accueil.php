<?php

include_once("../model/Event.php");
include_once("../model/DAO.class.php");

$contenu = $dao->getEventsReady();
if(!empty($contenu)){
    $data['contenu'] = $contenu;
}

include("../view/accueil.view.php");
?>
