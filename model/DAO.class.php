<?php

require_once("User.php");

$dao = new DAO();

class DAO {

    private $db;
    private $database = 'sqlite:../data/booker.db';

    function __construct() {
        try {
            $this->db = new PDO('sqlite:../data/booker.db');
        } catch (PDOException $e) {
            die("erreur de connexion:" . $e->getMessage());
        }
    }

    function insertUser(User $user) {
        try {
            $q = mysql_real_escape_string("INSERT INTO user VALUES ('$user->getUsername()','$user->getPassword()','$user->getFirstNAme()','$user->getLastName()','$user->getEmail()','$user->getPlace()','$user->getType()','$user->getInfos','$user->getProfilPic()')");
            $r = $this->db->exec($q);
            if ($r == 0) {
                die("createUser error: no user inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    function getAllFromId($username) {
        $req = mysql_real_escape_string("SELECT * FROM user WHERE username='$username'");
        if ($req == NULL) {
            throw new Exception('Identifiant introuvable');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'user');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUsersFromCategorie($type) {
        $req = mysql_real_escape_string("SELECT * FROM user WHERE type='$type'");
        if ($req == NULL) {
            throw new Exception('Type introuvable');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'user');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUserFromIdAndMdp($username,$password) {
          $req = mysql_real_escape_string("SELECT * FROM user WHERE username='$username'AND password='$password'");
        if ($req == NULL) {
            throw new Exception('Identifiant ou mot de passe erroné');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'user');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    
    function hashPassWord($password){
        $one = 'b00kerPr0jEcT';
        $two = 'SecuRed5DataBase';
        $npassword = sha1($one.$password.$two);
        return $npassword;
    }

}