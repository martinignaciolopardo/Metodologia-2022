<?php
require_once "./Views/medicView.php";
require_once "./Models/medicModel.php";
//require_once "./Helpers/AuthHelper.php";

class MedicController{
    private $model;
    private $view;
    //private $authHelper;

    function __construct(){
        $this->model = new medicModel();
        $this->view = new medicView();
        //$this->authHelper = new AuthHelper();
    }
    
    function showMedics(){
        //$this->authHelper->checkLoggedIn();
        //$this->authHelper->checkMedic();
        $medicos = "";
        $obraSocial = null;
        $especialidad = null;

        if (isset($_GET['obraSocial']) && $_GET['obraSocial'] && $_GET['obraSocial'] != 5){
            $obraSocial = $_GET['obraSocial'];
        }
        if (isset($_GET["especialidad"]) && !empty($_GET["especialidad"])){
            $especialidad = $_GET["especialidad"];
        }
        if (!$obraSocial) {
            if ($especialidad) {
                $medicos = $this->model->getMedicsByspecialty($especialidad); // trae los medicos con x especialidad
            } 
            else $medicos = $this->model->getMedics(); // trae todos los medicos
        }if (!$especialidad) {
            if ($obraSocial) {
                $medicos = $this->model->getMedicsBySocialWork($obraSocial); // trae los medicos con x obra social
            }
            else $medicos = $this->model->getMedics(); // trae todos los medicos
        }
        if ($especialidad && $obraSocial) {
            $medicos = $this->model->getFilteredMedics($obraSocial, $especialidad);
        }
        if (!$obraSocial) {
           $obraSocial = 5;
        }
        $this->view->renderMedics($medicos, $obraSocial); // llama a la vista, con la lista de medicos
    }
}
