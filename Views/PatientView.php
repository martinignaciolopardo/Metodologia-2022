<?php
require_once('libs/Smarty.class.php');

class PatientView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showRegister($result)
    {
        $this->smarty->assign('result', $result);
        $this->smarty->display('templates/registerPatient.tpl');
    }
}