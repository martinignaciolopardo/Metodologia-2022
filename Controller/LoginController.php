<?php

require_once "./Views/LoginView.php";
require_once "./Controller/TurnsController.php";
require_once "./Models/LoginModel.php";
require_once "./Models/PatientModel.php";
require_once "./Views/PatientView.php";
require_once "./Views/medicView.php";

class LoginController
{

    private $model;
    private $view;
    private $authHelper;
    private $turnsView;

    function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->turnsView = new TurnsController();
        $this->patientModel = new PatientModel();
        $this->patientView = new PatientView();
        $this->medicView = new medicView();
        $this->authHelper = new AuthHelper();
    }


    function login()
    {
        $this->view->showLogin();
    }

    function loginPatient()
    {
        $this->view->showLoginPatient();
    }

    function verifyLogin()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $user = $this->model->getUser($usuario);
            if ($user && ($contrasenia == $user->contrasenia)) {
                $this->authHelper->login($user);
                $this->turnsView->showTurns();
            } else {
                $this->view->showLogin("Acceso denegado. Usuario o contraseña invalidos");
            }
        }
    }

    function identifyPatient()
    {
        if (!empty($_POST['dni']) && !empty($_POST['dni'])) {
            $dni = $_POST['dni'];
            $user = $this->patientModel->buscarPaciente($dni);
            if (!$user)
                $this->patientView->showRegister();
            else {
                $this->authHelper->identifyPatient($patient);
                $this->view->renderMedics();
            }
        }
    }
    function showRegister()
    {
        $this->view->showRegister();
    }
}
