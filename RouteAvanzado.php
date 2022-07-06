<?php
require_once './Controller/TurnsController.php';
require_once './Controller/LoginController.php';
require_once './Controller/MedicController.php';
require_once './Controller/PatientController.php';
require_once 'RouterClass.php';

// CONSTANTES PARA RUTEO
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');
//define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
//define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$r = new Router();

// TURNS CONTROLLER
$r->addRoute("turnos", "GET", "TurnsController", "showTurns");
$r->addRoute("turnos/:ID", "GET", "TurnsController", "showTurnsByMedic");
$r->addRoute("verifyUser", "POST", "LoginController", "verifyLogin");
$r->addRoute("addUser", "POST", "PatientController", "addPaciente");
$r->addRoute("indentifyPatient", "POST", "LoginController", "indentifyPatient");
$r->addRoute("medicos", "GET", "MedicController", "showMedics");
$r->addRoute("login", "GET", "LoginController", "login");
$r->addRoute("register", "GET", "LoginController", "showRegister");
$r->addRoute("loginPatient", "GET", "LoginController", "loginPatient");
$r->addRoute("verifyPatient", "GET", "LoginController", "verifyPatient");

//Ruta por defecto
$r->setDefaultRoute("LoginController", "loginPatient");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
