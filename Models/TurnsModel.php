<?php

class TurnsModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpe_metodologias;charset=utf8', 'root', '');
    }

    function showTurns($id)
    {
        $query = $this->db->prepare('
            SELECT *
            FROM turno
            WHERE id_medico = ?
        ');
        $query->execute(array($id));
        $turns = $query->fetchAll(PDO::FETCH_OBJ);
        return $turns;
    }

    function showMorningTurns($id)
    {
        $query = $this->db->prepare('
            SELECT *
            FROM turno
            WHERE fecha
            AND hour(fecha) BETWEEN "07:30:00" AND "11:30:00"
            AND id_medico = ?
        ');
        $query->execute(array($id));
        $turnsByMorning = $query->fetchAll(PDO::FETCH_OBJ);
        return $turnsByMorning;
    }

    function getAfternoonTurns($id)
    {
        $query = $this->db->prepare('
            SELECT *
            FROM turno
            WHERE fecha
            AND hour(fecha) BETWEEN "12:30:00" AND "16:30:00"
            AND id_medico = ?
        ');
        $query->execute(array($id));
        $turnsByAfternoon = $query->fetchAll(PDO::FETCH_OBJ);
        return $turnsByAfternoon;
    }

    function getTurnsByDay($idMedico, $fechaMin, $fechaMax = null)
    {
        if ($fechaMax) {
            $sentencia = $this->db->prepare(
                "SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND fecha <= CAST(? AS datetime)
                AND id_medico = ?
            ORDER BY fecha;"
            );
            $sentencia->execute(array($fechaMin, $fechaMax, $idMedico));
        } else {
            $sentencia = $this->db->prepare(
                "SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND id_medico = ?
            ORDER BY fecha;"
            );
            $sentencia->execute(array($fechaMin, $idMedico));
        }
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getTurnsByMorningAndDays($idMedico, $fechaMin, $fechaMax = null)
    {
        if ($fechaMax == null) {
            $sentencia = $this->db->prepare(
                "SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND id_medico = ?
                AND hour(fecha) BETWEEN '07:30:00' AND '11:30:00'
                ORDER BY fecha;"
            );
            $sentencia->execute(array($fechaMin, $idMedico));
        } else {
            $sentencia = $this->db->prepare(
                "SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND fecha <= CAST(? AS datetime)
                AND hour(fecha) BETWEEN '07:30:00' AND '11:30:00'
                AND id_medico = ?
            ORDER BY fecha;"
            );
            $sentencia->execute(array($fechaMin, $fechaMax, $idMedico));
        }
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getTurnsByAfternoonAndDays($idMedico, $fechaMin, $fechaMax = null)
    {
        if ($fechaMax == null) {
            $sentencia = $this->db->prepare(
                "SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND hour(fecha) BETWEEN '12:30:00' AND '16:30:00'
                AND id_medico = ?
                ORDER BY fecha;"
            );
            $sentencia->execute(array($fechaMin, $idMedico));
        } else {
            $sentencia = $this->db->prepare('
            SELECT * 
                FROM turno
                WHERE fecha >= CAST(? AS datetime)
                AND fecha <= CAST(? AS datetime)
                AND hour(fecha) BETWEEN "12:30:00" AND "16:30:00"
                AND id_medico = ?
            ORDER BY fecha;
            ');
            $sentencia->execute(array($fechaMin, $fechaMax, $idMedico));
        }
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
