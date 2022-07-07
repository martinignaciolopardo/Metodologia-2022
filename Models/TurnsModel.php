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

    function updateTurno($idPaciente, $turno)
    {
        $sentencia = $this->db->prepare("UPDATE turno SET id_paciente = ? WHERE id_turno = ?");
        $sentencia->execute(array($idPaciente, $turno));
    }

    function getTurno($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM turno WHERE id_turno = ?");
        $sentencia->execute(array($id));
        $turno = $sentencia->fetch(PDO::FETCH_OBJ);
        return $turno;
    }

    function getMedico($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM medico WHERE id_medico = ?");
        $sentencia->execute(array($id));
        $medico = $sentencia->fetch(PDO::FETCH_OBJ);
        return $medico;
    }

    function atiendeObraSocial($id_os, $id)
    {
        $sentencia = $this->db->prepare("SELECT diferencial FROM atiende WHERE id_medico = ? AND id_os = ?");
        $sentencia->execute(array($id, $id_os));
        $medico = $sentencia->fetch(PDO::FETCH_OBJ);
        return $medico;
    }
}
