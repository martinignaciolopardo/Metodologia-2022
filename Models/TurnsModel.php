<?php

class TurnsModel{   

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_metodologias;charset=utf8','root','');
    }
   
   function showMorningTurns($id){
        $query = $this->db->prepare('
            SELECT *
            FROM turno
            WHERE fecha
            AND hour(fecha) BETWEEN '07:30:00' AND '11:30:00'
            AND id_medico = ?
        ');
        $query->execute(array($id));
        $turnsByMorning = $query->fetchAll(PDO::FETCH_OBJ);
        return $turnsByTime;
    }

    function getAfternoonTurns($id){
        $query = $this->db->prepare('
            SELECT *
            FROM turno
            WHERE fecha
            AND hour(fecha) BETWEEN '12:30:00' AND '16:30:00'
            AND id_medico = ?
        ');
        $query->execute(array($id));
        $turnsByAfternoon = $query->fetchAll(PDO::FETCH_OBJ);
        return $turnsByAfternoon;
    }
}