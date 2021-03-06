<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author dyonj
 */
class Users {

    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $email;
    private $place;
    private $usertype;
    private $infos;
    private $profilpic;
    private $anecdote;
    private $video;

    function __construct($u = null, $pa = null, $f = null, $l = null, $e = null, $pl = null, $t = null, $i = null, $pr = null, $an = null, $vid=null) {
        if ($u) {
            $this->username = $u;
        }
        if ($pa) {
            $this->password = $pa;
        }
        if ($f) {
            $this->firstname = $f;
        }
        if ($l) {
            $this->lastname = $l;
        }
        if ($e) {
            $this->email = $e;
        }
        if ($pl) {
            $this->place = $pl;
        }
        if ($t) {
            $this->usertype = $t;
        }
        if ($i) {
            $this->infos = $i;
        }
        if ($pr) {
            $this->profilpic = $pr;
        }
        if ($an) {
            $this->anecdote = $an;
        }
        if ($vid) {
            $this->video = $vid;
        }
    }

#######################  getters  #######################

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getFirstName() {
        return $this->firstname;
    }

    function getLastName() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPlace() {
        return $this->place;
    }

    function getType() {
        return $this->usertype;
    }

    function getInfos() {
        return $this->infos;
    }

    function getProfilPic() {
        return $this->profilpic;
    }
    
    function getAnecdote() {
        return $this->anecdote;
    }
    
    function getVideo() {
        return $this->video;
    }

#######################  setters  #######################

    function setUsername($i) {
        $this->username = $i;
    }

    function setPassword($i) {
        $this->password = $i;
    }

    function setFirstName($i) {
        $this->firstname = $i;
    }

    function setLastName($i) {
        $this->lastname = $i;
    }

    function setEmail($i) {
        $this->email = $i;
    }

    function setPlace($i) {
        $this->place = $i;
    }

    function setType($i) {
        $this->usertype = $i;
    }

    function setInfos($i) {
        $this->infos = $i;
    }

    function setProfilPic($i) {
        $this->profilpic = $i;
    }
    
    function setAnecdote($an) {
        $this->anecdote = $an;
    }
    
    function setViceo($vid) {
        $this->video=$vid;
    }

}
class InfoArtistes {

    private $username;
    private $anecdote;
    private $video;

    function __construct($u = null,$an = null, $vid=null) {
        if ($u) {
            $this->username = $u;
        }
        if ($an) {
            $this->anecdote = $an;
        }
        if ($vid) {
            $this->video = $vid;
        }
    }

#######################  getters  #######################

    function getUsername() {
        return $this->username;
    }

    function getAnecdote() {
        return $this->anecdote;
    }
    
    function getVideo() {
        return $this->video;
    }

#######################  setters  #######################

    function setUsername($i) {
        $this->username = $i;
    }

    function setAnecdote($an) {
        $this->anecdote = $an;
    }
    
    function setViceo($vid) {
        $this->video=$vid;
    }

}