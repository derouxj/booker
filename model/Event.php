<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * id integer primary key AUTOINCREMENT,
    usernameBooker STRING references users(username),
    usernameOrg STRING references users(username),
    artists STRING references users(username),
    eventDate STRING,
    infos STRING
 * 
 * @author dyonj
 */
class Event {
    private $id;
    private $usernameBooker;
    private $usernameOrg;
    private $eventDate;
    private $infos;

    function __construct($i=null, $uB=null, $uO=null, $e=null, $inf=null){
        if($i){
            $this->id = $i;
        }
        if($uB){
            $this->usernameBooker = $uB;
        }
        if($uO){
            $this->usernameOrg = $uO;
        }
        if($e){
            $this->eventDate = $e;
        }
        if($inf){
            $this->infos = $inf;
        }
    }
    
    function getId(){
        return $this->id;
    }
    function getUsernameBooker(){
        return $this->usernameBooker;
    }
    function getUsernameOrg(){
        return $this->usernameOrg;
    }
    function getEventDate(){
        return $this->eventDate;
    }
    function getInfos(){
        return $this->infos;
    }
    
}