<?php
require_once "./Views/TurnsView.php";
require_once "./Models/TurnsModel.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Controller/MedicController.php";


class TurnsController
{
    private $model;
    private $view;
    private $authHelper;
    private $medicController;

    function __construct()
    {
        $this->model = new TurnsModel();
        $this->view = new TurnsView();
        $this->authHelper = new AuthHelper();
        $this->medicController = new MedicController();
    }

    function showTurns()
    {
        $this->authHelper->checkLoggedIn();
        $this->authHelper->checkMedic();
        $idMedico = $_SESSION['id'];
        $turnos = "";
        $timeRange = null;
        $fechaMin = null;
        $fechaMax = null;

        if (isset($_GET['timeRange']) && $_GET['timeRange'])
            $timeRange = $_GET['timeRange'];
        if (isset($_GET["fecha_min"]) && !empty($_GET["fecha_min"]))
            $fechaMin = $_GET["fecha_min"];
        if (isset($_GET["fecha_max"]) && !empty($_GET["fecha_max"]))
            $fechaMax = $_GET["fecha_max"];

        if ($fechaMin == null && $fechaMax == null) {
            if ($timeRange) {
                if ($timeRange == 'maniana') {
                    $turnos = $this->model->showMorningTurns($idMedico);  // verificar id medico
                } else if ($timeRange == 'tarde') {
                    $turnos = $this->model->getAfternoonTurns($idMedico);  // verificar id medico
                } else {
                    $turnos = $this->model->showTurns($idMedico);
                }
            } else $turnos = $this->model->showTurns($idMedico);
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
                        $turnos = $this->model->showTurns($idMedico);
                    }
                }
            }
        } else if ($timeRange && $fechaMin && $fechaMax) {
            if ($timeRange == 'maniana') {
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaMin);  // verificar id medico
            } else if ($timeRange == 'tarde')
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaMin);  // verificar id medico
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

    function showTurnsByMedic($params = null)
    {
        $this->authHelper->checkLoggedIn();
        $idMedico = $params[":ID"];
        $turnos = "";
        $timeRange = null;
        $fechaMin = null;
        $fechaMax = null;

        if (isset($_GET['timeRange']) && $_GET['timeRange'])
            $timeRange = $_GET['timeRange'];
        if (isset($_GET["fecha_min"]) && !empty($_GET["fecha_min"]))
            $fechaMin = $_GET["fecha_min"];
        if (isset($_GET["fecha_max"]) && !empty($_GET["fecha_max"]))
            $fechaMax = $_GET["fecha_max"];

        if ($fechaMin == null && $fechaMax == null) {
            if ($timeRange) {
                if ($timeRange == 'maniana') {
                    $turnos = $this->model->showMorningTurns($idMedico);  // verificar id medico
                } else if ($timeRange == 'tarde') {
                    $turnos = $this->model->getAfternoonTurns($idMedico);  // verificar id medico
                } else {
                    $turnos = $this->model->showTurns($idMedico);
                }
            } else $turnos = $this->model->showTurns($idMedico);
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
                        $turnos = $this->model->showTurns($idMedico);
                    }
                }
            }
        } else if ($timeRange && $fechaMin && $fechaMax) {
            if ($timeRange == 'maniana') {
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->model->getTurnsByMorningAndDays($idMedico, $fechaMin);  // verificar id medico
            } else if ($timeRange == 'tarde')
                if ($fechaMax >= $fechaMin) //FECHAMAX ES MAYOR QUE EL FECHAMIN
                    $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaMin, $fechaMax);  // verificar id medico
                else
                    $turnos = $this->model->getTurnsByAfternoonAndDays($idMedico, $fechaMin);  // verificar id medico
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
        $this->view->renderTurnsForPatients($turnos, $idMedico);
    }

    function updateTurno($params = null)
    {
        $this->authHelper->checkLoggedIn();
        $idTurno = $params[":ID"];
        $nroPaciente = $_SESSION['nroAfiliado'];

        if ($nroPaciente && $idTurno) {
            $this->model->updateTurno($nroPaciente, $idTurno);
            $this->medicController->showMedics();
            $to_email = $_SESSION['mail'];
            $headers = "From: sender\'s email";
            $asd = mail($to_email, "reserva TurnoFacil", "Reservaste!!!Enhorabuena! Congratulaciones! Usted ha reservado un turno con TurnoFacil!! el proctologo!");
            if ($asd) {
                echo "Email successfully sent to $to_email...";
            } else {
                echo "Email sending failed...";
            }
        }
    }
    function confirmarTurno($params = null)
    {
        $this->authHelper->checkLoggedIn();
        $idTurno = $params[":ID"];
        $turno = $this->model->getTurno($idTurno);
        $medico = $this->model->getMedico($turno->id_medico);
        $this->view->verTurno($turno, $medico);
    }

    function mostrarDetalles($params = null)
    {
        $this->authHelper->checkLoggedIn();

        if (
            $_SESSION['nombre'] == $_POST['nombre'] &&
            $_SESSION['direccion'] == $_POST['direccion'] &&
            $_SESSION['telefono'] == $_POST['telefono'] &&
            $_SESSION['mail'] == $_POST['mail'] &&
            $_SESSION['dni'] == $_POST['dni'] &&
            $_SESSION['obra_social'] == $_POST['obraSocial'] &&
            $_SESSION['nroAfiliado'] == $_POST['nroAfiliado']
        ) {
            $idTurno = $params[":ID"];
            $turno = $this->model->getTurno($idTurno);
            $medico = $this->model->getMedico($turno->id_medico);
            $this->model->updateTurno($_SESSION['nroAfiliado'], $idTurno);
            $this->view->verDetallesTurno($turno, $medico);
        } else {
            header("Location: " . BASE_URL . "medicos");
        }
    }
}
