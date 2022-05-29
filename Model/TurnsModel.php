<?php

class TurnsModel{

function getTurnsByDay($idMedico, $fechaMin, $fechaMax = null){
    if(!$fechaMax){
    $sentencia = $this->db->prepare(
        "SELECT * 
        FROM turno
        WHERE fecha >= CAST(? AS datetime)
        AND fecha <= CAST(? AS datetime)
        AND id_medico = ?
    ORDER BY fecha;");
    $sentencia->execute(array($fechaMin, $fechaMax, $idMedico));
    }else{
        $sentencia = $this->db->prepare(
            "SELECT * 
            FROM turno
            WHERE fecha >= CAST(? AS datetime)
            AND fecha <= CAST(? AS datetime)
            AND id_medico = ?
        ORDER BY fecha;");
        $sentencia->execute(array($fechaMin, $fechaMax, $idMedico));
    }
    return $sentencia->fetch(PDO::FETCH_OBJ);
}

}