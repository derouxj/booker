<?php

require_once("../model/Users.php");
require_once("../model/Event.php");

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
            $fn = $this->db->quote($user->getFirstName());
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
    
    function insertEvent(Event $event, $arts){
        try {
            $unB = $this->db->quote($event->getUsernameBooker());
            $unO = $this->db->quote($event->getUsernameOrg());
            $evtD = $this->db->quote($event->getEventDate());
            $infos = $this->db->quote($event->getInfos());
            $q = "INSERT INTO event(usernameBooker,usernameOrg,eventDate,infos) VALUES ($unB,$unO,$evtD,$infos)";
            $r = $this->db->exec($q);
            if ($r == 0) {
                die("createEvent error: no event inserted\n");
            }
            $q= "SELECT * FROM event ORDER BY id DESC LIMIT 1";
            $r = $this->db->query($q)->fetchAll(PDO::FETCH_CLASS,'Event')[0];
            var_dump($arts);
            foreach($arts as $a){
                $id = $this->db->quote($r->getId());
                $username = $this->db->quote($a);
                $q = "INSERT INTO eventsOfUser VALUES ($id, $username)";
                $this->db->exec($q);
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
        $type = $this->db->quote($type);
        $req = ("SELECT * FROM users WHERE usertype=$type");
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
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'users');
            if (!empty($result)) {
                return true;
            } else {
                return false;
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
    
    //update un user avec un objet user
    function updateUser($un,$fn,$ln,$em,$pl,$in,$pp) {
        $un = $this->db->quote($un);
        $fn = $this->db->quote($fn);
        $ln = $this->db->quote($ln);
        $em = $this->db->quote($em);
        $pl = $this->db->quote($pl);
        $in = $this->db->quote($in);
        $pp = $this->db->quote($pp);
        $req = "UPDATE users SET firstname=$fn, lastname=$ln, email=$em, place=$pl, infos=$in, profilpic=$pp WHERE username=$un";
        try {
            $r = $this->db->exec($req);
            if ($r == 0) {
                die("updateUser error: no user updated\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
    
    function updatePassword($un,$pw) {
        $pw = $this->db->quote($this->hashPassWord($pw));
        $un = $this->db->quote($un);
        $req = "UPDATE users SET password=$pw WHERE username=$un";
        try {
            $r = $this->db->exec($req);
            if ($r == 0) {
                die("updateUser error: no password user updated\n");
            }
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

}
