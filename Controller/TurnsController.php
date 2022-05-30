<?php


require_once "./Views/TurnsView.php";
require_once "./Models/TurnsModel.php";


class TurnsController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new TurnsModel();
        $this->view = new TurnsView();
        $this->authHelper = new AuthHelper();
    }

    function showTurns()
    {
        $this->authHelper->checkLoggedIn();
        $this->authHelper->checkMedico();
        $idMedico = $_SESSION['id'];
        $turnos = "";
        $timeRange = null;
        $fechaMin = null;
        $fechaMax = null;

        if ($_GET['timeRange'] && isset($_GET['timeRange']))
            $timeRange = $_GET['timeRange'];
        if (isset($_GET["fecha_min"]) && !empty($_GET["fecha_min"]))
            $fechaMin = $_GET["fecha_min"]; //ver si hay que convertirlo a algun tio de string o datetime
        if (isset($_GET["fecha_max"]) && !empty($_GET["fecha_max"]))
            $fechaMax = $_GET["fecha_max"]; //ver si hay que convertirlo a algun tio de string o datetime

        if ($fechaMin == null && $fechaMax == null) {
            if ($timeRange) {
                if ($timeRange == 'maniana') {
                    $turnos = $this->TurnsModel->showMorningTurns($idMedico);  // verificar id medico
                } else if ($timeRange == 'tarde') {
                    $turnos = $this->TurnsModel->getAfternoonTurns($idMedico);  // verificar id medico
                } else {
                    $turnos = $this->TurnsModel->showTurns; //mostrar todos los turnos (joel)
                }
            } else $turnos = $this->TurnsModel->showTurns; //mostrar todos los turnos (joel);
        } else if (!$timeRange) {
            if ($fechaMin != null && $fechaMax != null) {
                if ($fechaMax >= $fechaMin) //SI TIENE SETEADA AMBOS LIMITES & FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin, $fechaMax);
                else
                    $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin); //SE FECHAMAX > FECHMIN
            } else {
                if ($fechaMin != null && $fechaMax == null) //SI TIENE FECHAMIN PERO NO FECHAMAX
                    $turnos = $this->model->getTurnsByDay($idMedico, $fechaMin);
                else {
                    if ($fechaMin == null && $fechaMax != null) { //SI NO TIENE FECHAMIN PERO SI FECHAMAX
                        $dt = new DateTime();
                        $fechaActual = $dt->format("d-m-Y h:i:s a");
                        $turnos = $this->model->getTurnsByDay($idMedico, $fechaActual, $fechaMax);
                    } else if ($fechaMin == null && $fechaMax == null) { //SI NO TIENE 
                        $turnos = $this->model->getTurns();
                    }
                }
            }
        } else if ($timeRange && $fechaMin && $fechaMax) {
            if ($timeRange == 'maniana') {
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->TurnsModel->getTurnsByMorningAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->TurnsModel->getTurnsByMorningAndDays($idMedico, $fechaMin);  // verificar id medico
            } else if ($timeRange == 'tarde')
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->TurnsModel->getTurnsByAfternoonAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->TurnsModel->getTurnsByAfternoonAndDays($idMedico, $fechaMin);  // verificar id medico
        } else if ($timeRange && !$fechaMin && $fechaMax) {
            $dt = new DateTime();
            $fechaActual = $dt->format("d-m-Y h:i:s a");
            if ($timeRange == 'maniana')
                $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaActual, $fechaMax);
            else if ($timeRange == 'tarde')
                $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaActual, $fechaMax);
        } else if ($timeRange && $fechaMin && !$fechaMax) {
            if ($timeRange == 'maniana')
                $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaMin);
            else if ($timeRange == 'tarde')
                $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaMin);
        }
        $this->view->renderTurns($turnos);
    }
}
