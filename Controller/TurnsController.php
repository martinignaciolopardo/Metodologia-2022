<?php

class TurnsController{

//AGREGAR A FUNCION GET TURNOS
/*

    //ACA SE DEFINE ID_MEDICO
    $idMedico = 1; //$_SESSION['id_medico'];

    $turnos = "";
    $fechaMin = null;
    $fechaMax = null;

    if (isset($_GET["fecha_min"]) && !empty($_GET["fecha_min"]))
        $fechaMin = $_GET["fecha_min"];     //ver si hay que convertirlo a algun tipo de string o datetime
    if (isset($_GET["fecha_max"]) && !empty($_GET["fecha_max"]))
        $fechaMax = $_GET["fecha_max"];     //ver si hay que convertirlo a algun tipo de string o datetime

    if($fechaMin != null && $fechaMax != null){
        if($fechaMax >= $fechaMin) //SI TIENE SETEADA AMBOS LIMITES & FECHAMAX ES MAYOR QUE EL FECHAMIN
            $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin, $fechaMax); 
        else
            $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin); //SE FECHAMAX > FECHMIN
    }else{
        if($fechaMin != null && $fechaMax == null) //SI TIENE FECHAMIN PERO NO FECHAMAX
            $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin);
        else{
            if($fechaMin == null && $fechaMax != null){ //SI NO TIENE FECHAMIN PERO SI FECHAMAX
                $dt = new DateTime();  
                $fechaActual = $dt->format("d-m-Y h:i:s a"); 
                $turnos = $this->model->getTurnsByDay($idMedico, $fechaActual, $fechaMax);
            }else if($fechaMin == null && $fechaMax == null){ //SI NO TIENE 
                    $turnos = $this->model->getTurns();
                }
        }
    }
*/
}