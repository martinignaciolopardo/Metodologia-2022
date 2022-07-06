<?php

class medicModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpe_metodologias;charset=utf8', 'root', '');
    }

    // trae todos los medicos
    function getMedics(){
        $query = $this->db->prepare('
            SELECT *
            FROM obra_social o
            INNER JOIN atiende a
            ON o.id_os = a.id_os
            INNER JOIN medico m
            ON m.id_medico = a.id_medico
        ');
        $query->execute(array());
        $medics = $query->fetchAll(PDO::FETCH_OBJ);
        return $medics;
    }
    // trae todas las especialidades
    function getEspecialidades(){
        $query = $this->db->prepare('
            SELECT descripcion
            FROM obra_social
        ');
        $query->execute(array());
        $especialidades = $query->fetchAll(PDO::FETCH_OBJ);
        return $especialidades;
    }
    // trae todas las obras sociales
    function getObrasSociales(){
        $query = $this->db->prepare('
            SELECT especialidad
            FROM medico
        ');
        $query->execute(array());
        $obrasSociales = $query->fetchAll(PDO::FETCH_OBJ);
        return $obrasSociales;
    }

    //trae todos los medicos con la especialidad seleccionada
    function getMedicsByspecialty($especialidad){
        $query = $this->db->prepare('
            SELECT *
            FROM obra_social o
            INNER JOIN atiende a
            ON o.id_os = a.id_os
            INNER JOIN medico m
            ON m.id_medico = a.id_medico
            WHERE m.especialidad
            LIKE "%"?"%" 
        ');
        $query->execute(array($especialidad));
        $medics = $query->fetchAll(PDO::FETCH_OBJ);
        return $medics;
    }

    // trae todos los medicos que trabajen con la obra social seleccionada
    function getMedicsBySocialWork($obraSocial){
        $query = $this->db->prepare('
            SELECT *
            FROM obra_social o
            INNER JOIN atiende a
            ON o.id_os = a.id_os
            INNER JOIN medico m
            ON m.id_medico = a.id_medico
            HAVING o.id_os = ?
        ');
        $query->execute(array($obraSocial));
        $medics = $query->fetchAll(PDO::FETCH_OBJ);
        return $medics;
    }

    function getFilteredMedics($obraSocial, $especialidad){
        $query = $this->db->prepare('
            SELECT *
            FROM obra_social o
            INNER JOIN atiende a
            ON o.id_os = a.id_os
            INNER JOIN medico m
            ON m.id_medico = a.id_medico
            WHERE m.especialidad
            LIKE "%"?"%" 
            && o.id_os = ?
        ');
        $query->execute(array($especialidad, $obraSocial));
        $medics = $query->fetchAll(PDO::FETCH_OBJ);
        return $medics;
    }

}
