<?php
require_once('libs/Smarty.class.php');

class medicView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderMedics($medics, $obraSocial){
        $this->smarty->assign('medics', $medics);
        $this->smarty->assign('obra', $obraSocial);
        $this->smarty->display('templates/medicsList.tpl');
    }
}
