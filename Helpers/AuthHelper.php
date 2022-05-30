<?php

class AuthHelper
{

    function __construct()
    {
    }

    function verify()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    function checkLoggedIn()
    {
        $this->verify();
        if (!isset($_SESSION["rol"])) {
            header("Location: " . BASE_URL . "login");
            die;
        }
    }

    function checkMedic()
    {
        $this->verify();
        if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "medic") {
            header("Location: " . BASE_URL . "login");
            die;
        }
    }

    function login($user)
    {
        session_start();
        $_SESSION['nombre'] = $user->nombre;
        $_SESSION['apellido'] = $user->apellido;
        $_SESSION['usuario'] = $user->usuario;
        $_SESSION['rol'] = "medic"; //por ahora los unicos usuarios que pueden loguearse son medicos
        $_SESSION['id'] = $user->id_medico;
    }

    function logout()
    {
        $this->verify();
        session_destroy();
        header("Location: " . BASE_URL . "login");
        die;
    }

    function getUserName()
    {
        $this->verify();
        return $_SESSION['nombre'];
    }

    function getUserId()
    {
        $this->verify();
        return $_SESSION["id"];
    }
}
