<?php
require_once("../model/Users.php");
require_once("../model/Event.php");
require_once("../model/Message.php");
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
            var_dump($q);
            $r = $this->db->exec($q);
            var_dump($r);
            if ($r == 0) {
                die("createUser error: no user inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }
    function insertEvent(Event $event, $arts) {
        try {
            $unB = $this->db->quote($event->getUsernameBooker());
            $unO = $this->db->quote($event->getUsernameOrg());
            $evtN = $this->db->quote($event->getEventName());
            $evtP = $this->db->quote($event->getEventPlace());
            $evtD = $this->db->quote($event->getEventDate());
            $infos = $this->db->quote($event->getInfos());
            $q = "INSERT INTO event(usernameBooker,usernameOrg,eventName,eventPlace,eventDate,infos,ready) VALUES ($unB,$unO,$evtN,$evtP,$evtD,$infos,0)";
            $r = $this->db->exec($q);
            if ($r == 0) {
                die("createEvent error: no event inserted\n");
            }
            $q = "SELECT * FROM event ORDER BY id DESC LIMIT 1";
            $r = $this->db->query($q)->fetchAll(PDO::FETCH_CLASS, 'Event')[0];
            var_dump($arts);
            foreach ($arts as $a) {
                $id = $this->db->quote($r->getId());
                $username = $this->db->quote($a);
                $q = "INSERT INTO eventsOfUser VALUES ($username, $id)";
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
    
        function getAllFromInfoArtiste($username) {
        $username = $this->db->quote($username);
        $req = "SELECT * FROM infoartistes WHERE username=$username";
        try {
            $res1 = $this->db->query($req);
            if (!$res1) {
                return false;
            } else {
                $result = $res1->fetchAll(PDO::FETCH_CLASS, 'infoartistes');
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
    function getEventsOfBooker($booker) {
        $booker = $this->db->quote($booker);
        $req = ("SELECT * FROM event WHERE usernameBooker=$booker");
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'event');
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
    function updateUser($un, $fn, $ln, $em, $pl, $in, $pp) {
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
    
        function updateinfoartiste($un,$an,$vid) {
        $un = $this->db->quote($un);
        $an = $this->db->quote($an);
        $vid = $this->db->quote($vid);
        $req = "UPDATE infoartistes SET anecdote=$an, video=$vid WHERE username=$un";
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
        $req = "SELECT * FROM contacts WHERE usernameProp='$proprietaire'"; //il ne faudrait pas tout prendre, a modifier
        //var_dump($req);
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    function insertCarnet($prop, $fn, $ln, $em, $pl, $jb, $tl, $ot) {
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
    function updateCarnet($fn, $ln, $em, $pl, $jb, $tl, $ot, $id) {
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
        $req = "SELECT * FROM contacts WHERE idC='$noC'";
        //var_dump($req);
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    function getUsers() {
        $req = "SELECT username FROM users";
        //var_dump($req);
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    function getMessages($username) {
        $username = $this->db->quote($username);
        $req = "SELECT * FROM messages WHERE receiver=$username";
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'Message');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    function sendMessage($sender, $receiver, $message) {
        $sender = $this->db->quote($sender);
        $receiver = $this->db->quote($receiver);
        $message = $this->db->quote($message);
        $date = time('d-h-m-s');
        $req = "INSERT INTO messagerie VALUES ($sender, $receiver, $message, $date)";
        try {
            $res1 = $this->db->exec($req);
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    
    function getEventFromId($id) {
        $id = $this->db->quote($id);
        $req = "SELECT * FROM event WHERE id=$id";
        try {
            $res1 = $this->db->query($req);
            if (!$res1) {
                return false;
            } else {
                $result = $res1->fetchAll(PDO::FETCH_CLASS, 'event');
                return $result;
            }
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }
    
    function getUsersFromEventId($id) {
        $id = $this->db->quote($id);
        $req = "SELECT u.username,u.password,u.firstname,u.lastname,u.email,u.place"
                . ",u.usertype,u.infos,u.profilpic FROM users u, eventsOfUser e WHERE e.id=$id and e.username=u.username";
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
}