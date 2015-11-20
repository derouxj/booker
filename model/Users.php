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
    
    function __construct($u, $pa, $f, $l, $e, $pl, $t, $i, $pr){
    if($u != null) {$this->username = $u;}
    if($u != null) {$this->password = $pa;}
    if($u != null) {$this->firstname = $f;}
    if($u != null) {$this->lastname = $l;}
    if($u != null) {$this->email = $e;}
    if($u != null) {$this->place = $pl;}
    if($u != null) {$this->usertype = $t;}
    if($u != null) {$this->infos = $i;}
    if($u != null) {$this->profilpic = $pr;}
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
