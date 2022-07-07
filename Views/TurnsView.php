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

    function renderTurnsForPatients($turnos, $idMedico, $msj = null)
    {
        $this->smarty->assign('turnos', $turnos);
        $this->smarty->assign('id', $idMedico);
        $this->smarty->assign('msj', $msj);
        $this->smarty->display('templates/turnsPatient.tpl');
    }

    function verTurno($turno, $medico)
    {
        $this->smarty->assign('turno', $turno);
        $this->smarty->assign('medico', $medico);
        $this->smarty->display('templates/confirmarTurno.tpl');
    }

    function verDetallesTurno($turno, $medico)
    {
        $this->smarty->assign('turno', $turno);
        $this->smarty->assign('medico', $medico);
        $this->smarty->display('templates/verDetallesTurno.tpl');
    }
}
