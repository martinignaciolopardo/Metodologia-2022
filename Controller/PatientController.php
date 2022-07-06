<?php
require_once "./Views/PatientView.php";
require_once "./Models/PatientModel.php";

class PatientController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new PatientModel();
        $this->view = new PatientView();
    }
    
    function addPaciente() {
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $mail = $_POST['mail'];
        $obraSocial = $_POST['obraSocial'];
        $nroAfiliado = $_POST['nroAfiliado'];
        $contrasena = $_POST['contrasena'];
        $user = $this->model->buscarPaciente($dni);
        if (($user == NULL)&&(isset($nombre)&&isset($dni)&&isset($direccion)&&isset($telefono)&&isset($mail)&&isset($obraSocial)&&isset($nroAfiliado)&&isset($contrasena))) {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $this->model->agregarPaciente($nombre, $dni, $direccion, $telefono, $mail, $obraSocial, $nroAfiliado, $hash);
            $this->view->showRegister("Se registro al usuario exitosamente.");
        } else {
            $this->view->showRegister("Ocurrió un error en el registro.");
        }
    }
}
