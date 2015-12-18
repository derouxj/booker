<?php

include_once("../model/DAO.class.php");

$s = "";
$correct = 1;
if (isset($_COOKIE['username'])) {
  $data['user'] = $dao->getAllFromUserName($_COOKIE['username']);
}
if (isset($_POST['valider'])) {
    if(!$_POST['firstname'] != '') {
        $s .= '\n   - Prenom';
        $correct = 0;
    }
    if(!$_POST['lastname']) {
        $s .= '\n   - Nom';
        $correct = 0;
    }
    if(!$_POST['email']) {
        $s .= '\n   - Email';
        $correct = 0;
    }
    if($correct) {
        $dao->updateUser($_COOKIE['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['place'],$_POST['infos'],$_POST['pic']);
        header('Location: ../controller/changeacc.php?modif=true');
    }
    if ($s != "") {$_POST['fieldnotset'] = $s;}
}

include("../view/changeacc.view.php");

?>