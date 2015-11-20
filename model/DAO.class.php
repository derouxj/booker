<?php

require_once("Utilisateur.class.php");

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

    function insertUser(Utilisateur $user) {
        try {
            $q = "INSERT INTO utilisateur (id,avatar,nom,prenom,email,lieu,categorie,mdp,description)
                VALUES ('$users->id','$users->avatar','$users->nom','$users->prenom','$users->email','$users->lieu','$users->categorie','$users->mdp','$users->description')";
            $r = $this->db->exec($q);
            if ($r == 0) {
                die("createUser error: no user inserted\n");
            }
        } catch (PDOException $e) {
            die("PDO Error :" . $e->getMessage());
        }
    }

    function getAllFromId($id) {
        $req = "SELECT * FROM utilisateur WHERE id='$id'";
        if ($req == NULL) {
            throw new Exception('Identifiant introuvable');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'utilisateur');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUsersFromCategorie($categorie) {
        $req = "SELECT * FROM utilisateur WHERE categorie='$categorie'";
        if ($req == NULL) {
            throw new Exception('categorie introuvable');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'utilisateur');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

    function getUserFromIdAndMdp($id,$mdp) {
          $req = "SELECT * FROM utilisateur WHERE id='$id'AND mdp='$mdp'";
        if ($req == NULL) {
            throw new Exception('identifiant ou mot de passe erroné');
        }
        try {
            $res1 = $this->db->query($req);
            $result = $res1->fetchAll(PDO::FETCH_CLASS, 'utilisateur');
            return $result;
        } catch (PDOException $e) {
            die("erreur lors de la requete" . $e->getMessage());
        }
    }

}

?>