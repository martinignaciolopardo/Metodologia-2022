<?php


require_once "./Metodologia-2022-vueTurns_TPE2-39/Views/TurnsView.php";
require_once "./Metodologia-2022-vueTurns_TPE2-39/Models/TurnsModel.php";


    class TurnsController{

        private $model;
        private $view;
        private $authHelper;
       
    function __construct(){
        $this->model = new TurnsModel();
        $this->view = new TurnsView();
        $this->authHelper = new AuthHelper();
    }

    function showTurns(){
        $this->authHelper->checkLoggedIn();
        $this->authHelper->checkMedico();
        $id = $_SESSION['id']
        if($_GET['timeRange'] && isset($_GET['timeRange'])){
            if ($_GET['timeRange'] == 'maniana') {
                $action = $turn = $this->TurnsModel->showMorningTurns(1);  // verificar id medico
            }if($_GET['timeRange'] == 'tarde'){
                $action = $turn = $this->TurnsModel->getAfternoonTurns(1);  // verificar id medico
            }else{
                $action = $turn = $this->TurnsModel->showTurns; //mostrar todos los turnos (joel)
            }
        }
        $this->view->renderTurns($action);
    }

}