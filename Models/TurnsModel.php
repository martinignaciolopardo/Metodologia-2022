<?php

class TurnsModel{   

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_metodologias;charset=utf8','root','');
    }
   
}