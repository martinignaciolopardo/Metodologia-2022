<?php
require_once('libs/Smarty.class.php');

class TurnsView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function renderTurns($turnos)
    {
        $this->smarty->assign('turnos', $turnos);
        $this->smarty->display('templates/turnsMedic.tpl');
    }
}