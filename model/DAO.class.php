<?php

require_once("../model/Users.php");

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

    function insertUser(Users $user) {
        try {
            $name = $this->db->quote($user->getUsername());
            $pw = $this->db->quote($user->getPassword());
            $fn = $this->db->quote($user->getFirstNAme());
            $ln = $this->db->quote($user->getLastName());
            $em = $this->db->quote($user->getEmail());
            $pl = $this->db->quote($user->getPlace());
            $ty = $this->db->quote($user->getType());
            $in = $this->db->quote($user->getInfos());
            $pp = $this->db->quote($user->getProfilPic());
            $q = "INSERT INTO users VALUES ($name,$pw,$fn,$ln,$em,$pl,$ty,$in,$pp)";
            $r = $this->db->exec($q);
            if ($r == 0) {
                die("createUser error: no user inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    function getAllFromUserName($username) {
        $username = $this->db->quote($username);
        $req = "SELECT * FROM users WHERE username=$username";
        try {
            $res1 = $this->db->query($req);
            if (!$res1) {
                return false;
            } else {
                $result = $res1->fetchAll(PDO::FETCH_CLASS, 'users');
                return $result;
            }
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUsersFromUserType($type) {
        $req = $this->db->quote("SELECT * FROM users WHERE type='$type'");
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'users');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUserFromUserNameAndPassWord($username, $password) {
        $req = $this->db->quote("SELECT * FROM users WHERE username='$username'AND password='$password'");
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'users');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function rightPassword($un, $pw) {
        $pw = $this->db->quote($this->hashPassWord($pw));
        $un = $this->db->quote($un);
        $req = "SELECT * FROM users WHERE username=$un and password=$pw";
        try {
            $res1 = $this->db->query($req);
            if (!$res1) {
                return false;
            } else {
                //$result = $res1->fetchAll(PDO::FETCH_CLASS, 'users');
                //var_dump($result);
                return true;
            }
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function hashPassWord($password) {
        $one = 'b00kerPr0jEcT';
        $two = 'SecuRed5DataBase';
        $npassword = sha1($one . $password . $two);
        return $npassword;
    }
    
    function getCarnet($proprietaire) {
        $req="SELECT * FROM contacts WHERE usernameProp='$proprietaire'";//il ne faudrait pas tout prendre, a modifier
        //var_dump($req);
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

}
