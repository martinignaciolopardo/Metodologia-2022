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

}