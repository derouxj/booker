<?php

include_once("../model/Users.php");
include_once("../model/DAO.class.php");

$dao = new DAO();

if (isset($_POST['valider'])) {
    $correct = 1;
    $s = "";
    if (isset($_POST['valider'])) {
        if (isset($_POST['id']) && !$dao->getAllFromUserName($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            $s .= "\n   - Identifiant";
            $correct = 0;
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        if (isset($_POST['email']) && $_POST['email'] != '') {
            $email = $_POST['email'];
        } else {
            $s .= "\n   - Email";
            $correct = 0;
        }
        $lieu = $_POST['lieu'];
        $type = $_POST['type'];
        if (isset($_POST['password']) && $_POST['password'] != '') {
            if (isset($_POST['passwordconf']) && $_POST['passwordconf'] != '' &&
                    $_POST['passwordconf'] == $_POST['password']) {
                $password = $_POST['password'];
            } else {
                $s .= "\n   - Le mot de passe et sa confirmation doivent être identique";
                $correct = 0;
            }
        } else {
            $s .= "\n   - Mot de passe";
            $correct = 0;
        }
        $desc = $_POST['desc'];
        if($s != "") {$_POST['fieldnotset'] = $s;}
        if ($correct) {
            $user = new Users($id, $dao->hashPassWord($password), $prenom, $nom, $email, $lieu, $type, $desc, 'Default');
            $dao->insertUser($user);
            unset($user);
        }
    }
}
include("../view/inscription.view.php");
?>
