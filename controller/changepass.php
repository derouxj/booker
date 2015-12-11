<?php

include_once("../model/DAO.class.php");

if (isset($_POST['valider'])) {
    $s = "";
    if ($_POST['oldpass']) {
        if ($_POST['newpass'] != "" && ($_POST['newpass'] == $_POST['confnewpass'])) {
            if ($dao->rightPassword($_COOKIE['username'], $_POST['oldpass'])) {
            } else {
                $s .= '\n   - Ancien mot de passe ne correspond pas';
            }
        } else {
            $s .= '\n   - Le mot de passe et sa confirmation doivent être identique';
        }
    } else {
        $s .= '\n   - Champ ancien mot de passe vide';
    }
    if ($s != "") {
        $_POST['nouserfound'] = 1;
        $_POST['fieldnotset'] = $s;
    } else {
        $dao->updatePassword($_COOKIE['username'], $_POST['newpass']);
        unset($_POST['nouserfound']);
    }
}

include("../view/changepass.view.php");

?>