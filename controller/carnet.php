<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("../model/DAO.class.php");
$mesContacts=$dao->getCarnet("jejej");
include ("../view/carnet.view.php");


?>