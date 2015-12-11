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
            if (!$res1) {
                return false;
            } else {
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
            die("PDO Error :" . $e->getMessage());
        }
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
    
    function insertCarnet($prop,$fn,$ln,$em,$pl,$jb,$tl,$ot) {
//INSERT INTO contacts VALUES (3,"jejej","le prenom","le nom","l'email@test.fr","la-ville","le metiers","0"+"000642350091","il a plein d'info super utile qu'il ne faut pas oublier meme si s'est tres long voir trop long il faudra que ca soit beau et bien placé");

        $prop = $this->db->quote($prop);
        $fn = $this->db->quote($fn);
        $ln = $this->db->quote($ln);
        $em = $this->db->quote($em);
        $pl = $this->db->quote($pl);
        $jb = $this->db->quote($jb);
        $tl = $this->db->quote($tl);
        $ot = $this->db->quote($ot);
        $req = "INSERT INTO contacts(usernameProp,firstname,lastname,email,town,job,phone,other) VALUES ($prop, $fn,$ln,$em, $pl, $jb,$tl, $ot)";
        try {
            $r = $this->db->exec($req);
            if ($r == 0) {
                die("insertContact error: no contact inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
    
    function updateCarnet($fn,$ln,$em,$pl,$jb,$tl,$ot,$id) {
//INSERT INTO contacts VALUES (3,"jejej","le prenom","le nom","l'email@test.fr","la-ville","le metiers","0"+"000642350091","il a plein d'info super utile qu'il ne faut pas oublier meme si s'est tres long voir trop long il faudra que ca soit beau et bien placé");

        $fn = $this->db->quote($fn);
        $ln = $this->db->quote($ln);
        $em = $this->db->quote($em);
        $pl = $this->db->quote($pl);
        $jb = $this->db->quote($jb);
        $tl = $this->db->quote($tl);
        $ot = $this->db->quote($ot);
        $req = "UPDATE contacts SET firstname=$fn,lastname=$ln,email=$em,town=$pl,job=$jb,phone=$tl,other=$ot where idC=$id";
        try {
            $r = $this->db->exec($req);
            if ($r == 0) {
                die("updateContact error: no contact inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
    
    function deleteCarnet($id) {
//INSERT INTO contacts VALUES (3,"jejej","le prenom","le nom","l'email@test.fr","la-ville","le metiers","0"+"000642350091","il a plein d'info super utile qu'il ne faut pas oublier meme si s'est tres long voir trop long il faudra que ca soit beau et bien placé");
        $req = "DELETE FROM contacts WHERE idC=$id";
        try {
            $r = $this->db->exec($req);
            if ($r == 0) {
                die("deleteContact error: no contact inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
    
    function getContactCarnet($noC) {
        $req="SELECT * FROM contacts WHERE idC='$noC'";
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