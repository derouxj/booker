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
    private $eventName;
    private $eventPlace;
    private $eventDate;
    private $infos;
    private $ready;

    function __construct($i=null, $uB=null, $uO=null, $en=null, $ep=null, $ed=null, $inf=null, $r=null){
        if($i){
            $this->id = $i;
        }
        if($uB){
            $this->usernameBooker = $uB;
        }
        if($uO){
            $this->usernameOrg = $uO;
        }
        if($en){
            $this->eventName = $en;
        }
        if($ep){
            $this->eventPlace = $ep;
        }
        if($ed){
            $this->eventDate = $ed;
        }
        if($inf){
            $this->infos = $inf;
        }
        if($inf){
            $this->ready = $r;
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
    function getEventName(){
        return $this->eventName;
    }
    function getEventPlace(){
        return $this->eventPlace;
    }
    function getEventDate(){
        return $this->eventDate;
    }
    function getInfos(){
        return $this->infos;
    }
    function getReady(){
        return $this->ready;
    }
    
}