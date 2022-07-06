<?php
require_once('libs/Smarty.class.php');

class LoginView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showLogin()
    {
        $this->smarty->display('templates/login.tpl');
    }

    function showLoginPatient()
    {
        $this->smarty->display('templates/loginPatient.tpl');
    }

    function showRegister()
    {
        $this->smarty->assign('result', "");
        $this->smarty->display('templates/registerPatient.tpl');
    }
}
