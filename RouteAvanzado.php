<?php
    require_once 'Controller/TurnsController.php';
    require_once 'Controller/loginController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    //define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    //define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    // TURNS CONTROLLER
    $r->addRoute("turnos", "GET", "TurnsController", "showTurns"); // turnos

    //Ruta por defecto.
    //$r->setDefaultRoute("LoginController", "login");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);