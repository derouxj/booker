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
class User {
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $email;
    private $place;
    private $usertype;
    private $infos;
    private $profilpic;
    
    function __construct($u, $pa, $f, $l, $e, $pl, $t, $i, $pr){
    $this->username = $u;
    $this->password = $pa;
    $this->firstname = $f;
    $this->lastname = $l;
    $this->email = $e;
    $this->place = $pl;
    $this->usertype = $t;
    $this->infos = $i;
    $this->profilpic = $pr;
    }
    
#######################  getters  #######################
    
    function getUsername(){
        return $this->username;
    }
    function getPassword(){
        return $this->password;
    }
    function getFirstName(){
        return $this->firstname;
    }
    function getLastName(){
        return $this->lastname;
    }
    function getEmail(){
        return $this->email;
    }
    function getPlace(){
        return $this->place;
    }
    function getType(){
        return $this->usertype;
    }
    function getInfos(){
        return $this->infos;
    }
    function getProfilPic(){
        return $this->profilpic;
    }

    
#######################  setters  #######################
    
    function setUsername($i){
        $this->username = $i;
    }
    function setPassword($i){
        $this->password = $i;
    }
    function setFirstName($i){
        $this->firstname = $i;
    }
    function setLastName($i){
        $this->lastname = $i;
    }
    function setEmail($i){
        $this->email = $i;
    }
    function setPlace($i){
        $this->place = $i;
    }
    function setType($i){
        $this->usertype = $i;
    }
    function setInfos($i){
        $this->infos = $i;
    }
    function setProfilPic($i){
        $this->profilpic = $i;
    }
    
}
