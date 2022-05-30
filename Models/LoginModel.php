<?php

class LoginModel{   

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_metodologias;charset=utf8','root','');
    }
    
    function getUser($usuario){
        $query = $this->db->prepare('SELECT * FROM medico WHERE usuario=?'); 
        $query ->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}