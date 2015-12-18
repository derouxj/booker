<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author dyonj
 */
class Message {

    private $sender;
    private $receiver;
    private $title;
    private $message;
    private $date;

    function __construct($s = null, $r = null, $t = null, $m = null, $d = null) {
        if ($s) {
            $this->sender;
        }if ($r) {
            $this->receiver;
        }if ($t) {
            $this->title;
        }if ($m) {
            $this->message;
        }if ($d) {
            $this->date;
        }
    }

    function getSender() {
        return $this->sender;
    }

    function getReceiver() {
        return $this->receiver;
    }

    function getTitle() {
        return $this->title;
    }

    function getMessage() {
        return $this->message;
    }

    function getDate() {
        return $this->date;
    }

}
