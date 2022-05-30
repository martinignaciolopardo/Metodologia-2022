<?php

require_once "./Metodologia-2022-vueTurns_TPE2-39/Views/LoginView.php";
require_once "./Metodologia-2022-vueTurns_TPE2-39/Views/TurnsView.php";
require_once "./Metodologia-2022-vueTurns_TPE2-39/Models/LoginModel.php";


    class LoginController{

        private $model;
        private $view;
        private $authHelper;
        private $turnsView;

    function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->turnsView = new TurnsView();
        $this->authHelper = new AuthHelper();
    }  
  
  
    function login(){
        $this->view->showLogin();
    }
    
    function verifyLogin(){
        if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $user = $this->model->getUser($usuario);
           
          if ($user && password_verify($contrasenia, $user->contrasenia)) {
                $this->authHelper->checkLoggedIn();
                $_SESSION['usuario'] = $usuario;   
                $_SESSION['id_medico'] = $user->id_medico;
                $this->turnsView->renderTurns(); 
        } else {
                 $this->view->showLogin("Acceso denegado. Usuario o contraseña invalidos");
            }
        }
    }
}

