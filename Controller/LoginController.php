<?php

require_once "./Views/LoginView.php";
require_once "./Controller/TurnsController.php";
require_once "./Models/LoginModel.php";


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
        $this->authHelper = new AuthHelper();
    }


    function login()
    {
        $this->view->showLogin();
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
}
